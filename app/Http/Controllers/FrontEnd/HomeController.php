<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Banner\Entities\Banner;
use Modules\Categories\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Sliders\Entities\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders_main = Slider::where('type', 1)->get();
        $one_right = Banner::where('type', 1)->orderby('id', 'DESC')->first();
        $one_left = Banner::where('type', 2)->orderby('id', 'DESC')->first();
        $two_left = Banner::where('type', 3)->take(2)->get();
        $brands = Banner::where('type', 0)->orderby('id', 'DESC')->get();
        $categories = Category::ProductCategories()->take(4)->get();
        $products=Product::where('status',1)->take(5)->get();
        $vip=Product::where('status',1)->where('vip',1)->take(8)->get();


        return view('FrontEnd.Home.index',
            compact('sliders_main','vip','products', 'one_right', 'one_left', 'two_left', 'brands', 'categories'));
    }

    public function selectSearch(Request $request)
    {
        $query_string = $request->input('search');
        $search = Product::where('title', 'LIKE', '%' . $query_string . '%')->get();

        return view('FrontEnd.Home.result', compact('search', 'query_string'));
    }
}
