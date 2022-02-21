<?php

namespace App\Http\Controllers\FrontEnd\Content;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Contents\Entities\Content;
use Modules\Products\Entities\Product;


class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::where('category_id', 1)->where('published_at', '<', Carbon::now()->addMinute(210)->format('Y-m-d H:i:s'))->orderby('id', 'DESC')->paginate(10);
        $contents_cat1 = Content::where('category_id', 2)->orderby('id', 'DESC')->take(5)->get();
        return view('FrontEnd.Content.list', compact('contents', 'contents_cat1'));
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        $last_products = Product::where('status', 1)->where('created_at', '<', Carbon::now()->addMinute(210)->format('Y-m-d H:i:s'))->orderby('id', 'DESC')->take(5)->get();


        if (url()->previous() != url()->current()) {
            $content->update([
                'visit' => ($content->visit + 1)
            ]);
        }
        $last_news = Content::where('status', 1)->orderby('id', 'DESC')->take(5)->get();
        return view('FrontEnd.Content.show', compact('content', 'last_news', 'last_products'));
    }
}
