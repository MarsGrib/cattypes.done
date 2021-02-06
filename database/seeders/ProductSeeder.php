<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Market\Property;
use App\Models\Market\Categories\Category;
use App\Models\Market\Products\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $monitors =Category::where('name','Мониторы')->first();
        $headphones =Category::where('name','Наушники')->first();

        $prod = new Product();
        $prod->category_id=$monitors->id;
        $prod->name='Монитор HP 27" ';
        $prod->save();

        $prod = new Product();
        $prod->category_id=$headphones->id;
        $prod->name='Наушники Philips model-A';
        $prod->save();

        $prod = new Product();
        $prod->category_id=$headphones->id;
        $prod->name='Наушники Philips model-B';
        $prod->save();

        $prod = new Product();
        $prod->category_id=$headphones->id;
        $prod->name='Наушники Sony model-A';
        $prod->save();
    }
}
