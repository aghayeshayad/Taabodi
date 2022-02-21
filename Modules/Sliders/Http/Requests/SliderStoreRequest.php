<?php

namespace Modules\Sliders\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'image' => 'required|mimes:jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes', ['values' => 'jpeg']),
        ];
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
