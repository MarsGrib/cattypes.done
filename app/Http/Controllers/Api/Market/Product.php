<?php

namespace App\Http\Controllers\Api\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Hash\ProductsSearchHash;
use App\Models\Market\Products\Product as MarketProduct;
use App\Models\Market\Property;

class Product extends Controller
{
    //
    public function getSearchHashByFilters(Request $req)
    {
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';

        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();

        $codes=array_keys($data);
        // dd($codes);
        $propsArray=Property::whereIn('code',$codes)->get();
       

        foreach ($propsArray as $key => $property) {
            $property->values=$data[$property->code];
        }

        //TODO:: оптимизиция, вероятно это можно как-то лучше
        /* 
            Здесь используется это запрос:
            SELECT product_id,  COUNT('value') AS `matches`  FROM `products_properties` 
            WHERE  (`property_id` =2 AND `value`='philips' OR  `value`='sony' )
            OR   (`property_id` = 5 AND `value`='1' ) 
            GROUP BY product_id
            HAVING matches = 2 
        */


        $product_ids=DB::table('products_properties')
        ->select(DB::raw("product_id,  COUNT('value') AS `matches`"))
        ->where(function($q1) use($propsArray){
            foreach ($propsArray as $key => $property) {
                $q1->orWhere('property_id',$property->id)->where(function($q) use($property){
                    if($property->type_id==1){
                        if(is_array($property->values))
                        {
                            $q->whereIn('value',$property->values);
                        }
                        else
                        {
                            $q->where('value',$property->values);
                        }
                    }
                    else if($property->type_id==1){
                        $q->where('value','>',$property->values[0])->where('value','<',$property->values[1]);
                     
                    }
                    else if($property->type_id==3){
                        $q->where('value',$property->values);
                    }
                });
            }
        })->groupBy('product_id')
        ->having(DB::raw('count(matches)'), '=', count($codes))->pluck('product_id');
        
       
        //TODO:: выбрать хеш функцию
        //TODO:: установить срок жизни другим способом
        //TODO:: вообще использовать какой-нибудь RAM хранилище типа редис
        
        $search_hash=md5(implode('_',$product_ids->toArray()).'-'.implode('',$codes).date('H-m-d-Y'));
        
        $answer->data=[];
        $answer->data['search_hash']=$search_hash;

        $hashData=ProductsSearchHash::getHashKey($search_hash);
        if($hashData==null) 
        {
            //приготовим выборку по поисковому хешу
            $products=MarketProduct::whereIn('id',$product_ids)->get();
            ProductsSearchHash::setHashKey($search_hash,json_encode($products));
        } 
 
        return response()->json($answer);

    }


    public function getResultByHash(Request $req)
    {
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';

        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();

        if(!isset($data['hash']))
        {
            $answer->error=1;
            $answer->message='Обязательный параметр `HASH` ';
        }
        else
        {
            $answer->data=[];
            $hashData=ProductsSearchHash::getHashKey($data['hash']);
            $answer->data['products']=json_decode($hashData);
        }

        
 
        return response()->json($answer);

    }
    
    
}
