<?php

namespace App\Http\Controllers\FrontEnd\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use Modules\Questions\Entities\Question;

class QuestionController extends Controller
{
    public function store(QuestionRequest $request, $productId)
    {
        Question::updateOrCreate([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
            'question' => $request->question
        ]);

        return back();
    }
}
