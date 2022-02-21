<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Categories\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\ProductPrice;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        foreach (range(1, 5) as $id)
//            Category::create([
//                'title' => Str::random('5'),
//                'id' => $id,
//                'type' => 'Product',
//                'slug' => Str::random('5')
//            ]);
    }
}
