<?php

namespace Modules\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Contents\Http\Requests\ContentCategories\ConcategoryUpdateRequest;

class BannerUpdateRequest extends BannerStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new BannerStoreRequest())->rules();
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
