<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Modules\Categories\Entities\Category;

use Modules\Products\Entities\Product;

class CategoryController extends Controller
{
    public function show($id, $type)
    {

        $subCategories = Category::where('id', $id)->get();

        $products = Product::filterWithCategory($id, $type)->get();
        return view('FrontEnd.Products.Categories.show', compact('products', 'subCategories'));
    }
}
