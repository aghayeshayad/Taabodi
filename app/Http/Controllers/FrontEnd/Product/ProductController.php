<?php

namespace App\Http\Controllers\FrontEnd\Product;

use App\Http\Controllers\Controller;
use Modules\Categories\Entities\Category;
use Modules\Products\Entities\Product;


/**
 *
 */
class ProductController extends Controller
{


    public function index()
    {

        $category = Category::with(['products' => function ($query) {
            $query->groupBy('category_id')
                ->select(Product::raw('count(*) AS productsCount'), 'category_id')
                ->with('category');
        }])
            ->paginate(9);

        $products = Product::where('status', 1)->paginate(9);


        return view('FrontEnd.Products.product-list', compact('category', 'products'));

    }

    public function show(Product $product, $id)
    {
        $product = Product::with('Informations')->findOrFail($id);


        return view('FrontEnd.Products.product', compact('product'));
    }


}
