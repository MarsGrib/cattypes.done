<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;

    public $type="none";
    /* protected $types=['none','list', 'range', 'bool'];  
    
     public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if(isset($this->types[$this->type_id])) $this->type=$this->types[$this->type_id];
    } */

    public function products()
    {
        return $this->belongsToMany('App\Models\Market\Products\Product','products_properties','property_id','product_id');
    }


    public function type()
    {
        return $this->belongs('App\Models\Market\ProppertyType','property_types','type_id');
    }
   
}
