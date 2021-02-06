<?php

namespace App\Models\Market\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /* $table->bigInteger('property_id');///->default("0");
    $table->text('value'); */

    public function category()
    {
        return $this->belongsTo('App\Models\Market\Categories\Category','category_id','id');
    }

    public function properties()
    {
        return $this->belongsToMany('App\Models\Market\Property','products_properties','product_id', 'property_id')->withPivot(['value','hidden']);
    }
}
