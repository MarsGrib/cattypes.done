<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Market\Property;
use App\Models\Market\PropertyType;
use App\Models\Market\Categories\Category;
use App\Models\Market\Products\Product;

class CategoryPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $propTypeList=new PropertyType();
        $propTypeList->name='list';
        $propTypeList->save();

        $propTypeRange=new PropertyType();
        $propTypeRange->name='range';
        $propTypeRange->save();

        $propTypeBool=new PropertyType();
        $propTypeBool->name='bool';
        $propTypeBool->save();

            $property = new Property();
            $property->type_id=$propTypeRange->id;  
            $property->name='Диагональ';
            $property->code='diagonal';
            $property->save();

            $property = new Property();
            $property->type_id=$propTypeList->id;  
            $property->name='Производитель';
            $property->code='brand';
            $property->save();

            $property = new Property();
            $property->type_id=$propTypeBool->id;  
            $property->name='Разъем HDMI 2.0';
            $property->code='hdmi_2_0';
            $property->save();

            $property = new Property();
            $property->type_id=$propTypeBool->id;;  
            $property->name='Разъем min jack 3.5';
            $property->code='min_jack_3_5';
            $property->save();

            $property = new Property();
            $property->type_id=$propTypeBool->id;;  
            $property->name='Bluetooth';
            $property->code='bluetooth';
            $property->save();
            
         
    }
}
