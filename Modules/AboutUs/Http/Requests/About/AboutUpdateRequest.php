<?php

namespace Modules\AboutUs\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Http\Requests\ContentCategories\ConcategoryUpdateRequest;

class AboutUpdateRequest extends AboutStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new AboutStoreRequest())->rules();
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
