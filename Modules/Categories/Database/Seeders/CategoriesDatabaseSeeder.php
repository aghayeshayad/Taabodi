<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;

class CategoriesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Category::create([
            'id'=>'1',
            'title'=>'پرینتر',
            'type'=>'Product',
            'slug'=>rand(1,5),
            'icon'=>'1'
        ]);
        Category::create([
            'id'=>'2',
            'title'=>'اسکنر',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
        Category::create([
            'id'=>'3',
            'title'=>'فکس',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
        Category::create([
            'id'=>'4',
            'title'=>'تجهیزات فروشگاهی',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
        Category::create([
            'id'=>'5',
            'title'=>'فتوکپی',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
        Category::create([
            'id'=>'6',
            'title'=>'کارتریج',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
//        Category::create([
//            'id'=>'7',
//            'title'=>'مواد مصرفی',
//            'type'=>'Product',
//            'icon'=>'1',
//            'slug'=>rand(1,90),
//        ]);
        Category::create([
            'id'=>'7',
            'title'=>'کامپیوتر و لپتاپ',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
        Category::create([
            'id'=>'8',
            'title'=>'استوک',
            'type'=>'Product',
            'icon'=>'1',
            'slug'=>rand(1,90),
        ]);
    }
}
