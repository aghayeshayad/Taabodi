<?php

namespace Modules\ContactUs\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Http\Requests\ContentCategories\ConcategoryUpdateRequest;

class FormContactUsUpdateRequest extends FormContactUsStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new FormContactUsStoreRequest())->rules();
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
