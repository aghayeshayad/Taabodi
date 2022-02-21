<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Modules\Products\Entities\Product;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        $product = Product::find($id);

        $product->Comments()->create($request->all());

        return back();
    }
}
