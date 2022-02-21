<?php

namespace Modules\Notices\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Http\Requests\ContentCategories\ConcategoryUpdateRequest;

class NoticesUpdateRequest extends NoticesStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new NoticesStoreRequest())->rules();
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
