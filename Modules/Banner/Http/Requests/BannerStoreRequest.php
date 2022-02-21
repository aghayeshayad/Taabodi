<?php

namespace Modules\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class BannerStoreRequest extends FormRequest
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
            'link' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'title.string' => trans('validation.string'),
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
