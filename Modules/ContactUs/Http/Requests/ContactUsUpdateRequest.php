<?php

namespace Modules\ContactUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Http\Requests\ContentCategories\ConcategoryUpdateRequest;

class ContactUsUpdateRequest extends ContactUsStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new ContactUsStoreRequest())->rules();
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
