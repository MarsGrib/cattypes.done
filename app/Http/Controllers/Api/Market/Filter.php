<?php

namespace App\Http\Controllers\Api\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Market\Categories\Category;
use App\Models\Market\Property;
use App\Models\Market\Products\Product;

class Filter extends Controller
{
    /**  
    *   Get Properties array by categoryId  
    *   with possible values for Property 
    *   for specificated Category
    *   
    *   @param  Integer $categoryId
    *   @return Array   $Properties     
    *                                 
    */
    public function list(Request $req)
    {
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';
        $answer->data=[];
        $answer->data['properties']=[];
        $categoryId=$req->input('categoryId');
        
        if($categoryId==null) return response()->json($answer);

        
       
        /*
        * Get possible values by using raw query builder
        * TODO:: switch to Eloquent Models
        */

        $properties = DB::table('products_properties')
        ->select(DB::raw("products_properties.property_id, properties.name, property_types.name AS `type` , properties.code, GROUP_CONCAT( DISTINCT value SEPARATOR ', ') AS `values` "))
        ->leftJoin('properties', 'properties.id', '=', 'products_properties.property_id')
        ->leftJoin('property_types', 'properties.type_id', '=', 'property_types.id')
        ->groupBy('property_id')
        ->whereIn('property_id',function($q) use ($categoryId){
                $q->select(DB::raw("property_id"))
                ->from('categories_properties')
                ->where('categories_properties.category_id',$categoryId);
            })->get();

            $answer->data['properties']=$properties;
       
        
        return response()->json($answer);
    }
}
