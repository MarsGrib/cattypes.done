<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Market\Property;
use App\Models\Market\Categories\Category;
use App\Models\Market\Products\Product;

class ProductPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prop_diagonal =  Property::where('code','diagonal')->first();
        $prop_barnd =  Property::where('code','barnd')->first();
        $prop_hdmi_2_0 =  Property::where('code','hdmi_2_0')->first();
        $prop_min_jack_3_5 =  Property::where('code','min_jack_3_5')->first();
        $prop_bluetooth =  Property::where('code','bluetooth')->first();


        //property for cat
        $cat =  Category::where('name',"Наушники")->first();
        $cat->properties()->attach($prop_barnd->id);
        $cat->properties()->attach($prop_hdmi_2_0->id);
        $cat->properties()->attach($prop_min_jack_3_5->id);
        $cat->properties()->attach($prop_bluetooth->id);
        //property for product
       
        $prod =  Product::where('name','Наушники Philips model-B')->first();
        $prod->properties()->attach($prop_min_jack_3_5->id,['value'=>'1']);
        $prod->properties()->attach($prop_bluetooth->id,['value'=>'0']);
        $prod->properties()->attach($prop_hdmi_2_0->id,['value'=>'0']);
        $prod->properties()->attach($prop_barnd->id,['value'=>'Philips']);

        $prod =  Product::where('name','Наушники Philips model-A')->first();
        $prod->properties()->attach($prop_min_jack_3_5->id,['value'=>'0']);
        $prod->properties()->attach($prop_bluetooth->id,['value'=>'1']);
        $prod->properties()->attach($prop_hdmi_2_0->id,['value'=>'0']);
        $prod->properties()->attach($prop_barnd->id,['value'=>'Philips']);

        $prod =  Product::where('name','Наушники Sony model-A')->first();
        $prod->properties()->attach($prop_min_jack_3_5->id,['value'=>'0']);
        $prod->properties()->attach($prop_hdmi_2_0->id,['value'=>'0']);
        $prod->properties()->attach($prop_bluetooth->id,['value'=>'1']);
        $prod->properties()->attach($prop_barnd->id,['value'=>'Sony']);

        
    }
}
