<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Modules\Products\Entities\Product;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sort(Request $request)
    {
        $query = Product::query();

        if($request->has('categoryId')) {
            $query->whereIn('category_id', $request->categoryId);
        }

        if($request->has('type')) {
            if($request->type == 1) {
                $query->whereIn('id', function($query) {
                    $query->from('product_prices')->orderBy('price', 'asc')->select('product_id')->get();
                });
            } elseif($request->type == 2) {
                $query->Where('vip', 1);
            } else {
                $query->Where('vip', 1)->where('best_sellers', 1);
            }
        }

        $products = $query->get();

        return view('FrontEnd.Products.sort', compact('products'));
    }
}
