<?php

namespace Modules\ContactUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class ContactUsStoreRequest extends FormRequest
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
            'meta_description' => 'required|string',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'phone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'email' => 'nullable|string',
            'address' => 'nullable|string',
            'lat' => 'nullable|string',
            'lan' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required'),
            'meta_description.required' => trans('validation.required'),
            'title.string' => trans('validation.string'),
            'meta_description.string' => trans('validation.string'),
            'description.string' => trans('validation.string'),
            'short_description.string' => trans('validation.string'),
            'phone.string' => trans('validation.string'),
            'mobile.string' => trans('validation.string'),
            'email.string' => trans('validation.string'),
            'address.string' => trans('validation.string'),
            'lat.string' => trans('validation.string'),
            'lan.string' => trans('validation.string')
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
