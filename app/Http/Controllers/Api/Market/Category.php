<?php

namespace App\Http\Controllers\Api\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Market\Categories\Category as ProductCategory;

class Category extends Controller
{
     
    public function getById(Request $req)
    {
        //TODO:: answer class
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';


        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();
         
        //TODO:: throw Exception
        if(!isset($data['id'])){
            $answer->error=1;
            $answer->message='Обязательный параметр ID';  //TODO:: файлы локализации
        }
        
        $category = ProductCategory::where('id',$data['id'])->first();
        $answer->data=[];
        $answer->data['category']=$category;
        return response()->json($answer);
    }


    public function add(Request $req)
    {
        //TODO:: answer class
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';


        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();
         
        //TODO:: throw Exception
        if(!isset($data['name'])){
            $answer->error=1;
            $answer->message='Обязательный параметр ';  //TODO:: файлы локализации
        }
        
        $category = new ProductCategory();
        $category->name=$data['name'];
        $category->save(); 

        $answer->data=[];
        $answer->data['category']=$category;
        return response()->json($answer);
    }


    public function update(Request $req)
    {
        //TODO:: answer class
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';


        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();
         
        //TODO:: throw Exception
        if(!isset($data['name']) || !isset($data['id'])){
            $answer->error=1;
            $answer->message='Обязательные параметры ID, NAME ';  //TODO:: файлы локализации
        }
        
        $category = ProductCategory::where('id',$data['id'])->first();
        $category->name=$data['name'];
        $category->save(); 
        
        $answer->data=[];
        $answer->data['category']=$category;
        return response()->json($answer);
    }


    public function edit(Request $req)
    {
        //TODO:: answer class
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';


        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();
         
        //TODO:: throw Exception
        if(!isset($data['name']) || !isset($data['id'])){
            $answer->error=1;
            $answer->message='Обязательные параметры ID, NAME ';  //TODO:: файлы локализации
        }
        
        $category = ProductCategory::where('id',$data['id'])->first();
        $category->name=$data['name'];
        $category->save(); 
        
        $answer->data=[];
        $answer->data['category']=$category;
        return response()->json($answer);
    }

    public function remove(Request $req)
    {
        //TODO:: answer class
        $answer = new \StdClass();
        $answer->error=0;
        $answer->message='ok';


        $cont=$req->getContent();
        $data=json_decode($req->getContent(),true);
        if($data==null) $data=$req->all();
        
        //TODO:: throw Exception
        if(!isset($data['id'])){
            $answer->error=1;
            $answer->message='Обязательный параметр ID';  //TODO:: файлы локализации
        }
        
        $category = ProductCategory::where('id',$data['id'])->delete();
        $answer->data=[];
        $answer->data['category']=null;
        return response()->json($answer);
    }
    

}
