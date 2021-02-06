<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Market\Property;
use App\Models\Market\Categories\Category;
use App\Models\Market\Products\Product;


class CatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cat = new Category();
        $cat->name="Мониторы";
        $cat->save();

        $cat = new Category();
        $cat->name="Клавиатуры";
        $cat->save();

        $cat = new Category();
        $cat->name="Наушники";
        $cat->save();
    }
}
