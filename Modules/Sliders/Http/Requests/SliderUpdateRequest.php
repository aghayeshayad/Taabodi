<?php

namespace Modules\Sliders\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends SliderStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new SliderStoreRequest())->rules();
        $rules['image'] = 'nullable|mimes:jpeg,png';

        return  $rules;
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
