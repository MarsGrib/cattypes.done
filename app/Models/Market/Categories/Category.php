<?php

namespace App\Models\Market\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function properties()
    {
        return $this->belongsToMany('App\Models\Market\Property','categories_properties','category_id','property_id');
    }


   
    
}
