<?php

namespace Modules\ContactUs\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class FormContactUsStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string',
            'mobile' => 'nullable|string',
            'message' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'email.required' => trans('validation.required'),
            'subject.required' => trans('validation.required'),
            'name.string' => trans('validation.string'),
            'email.string' => trans('validation.string'),
            'subject.string' => trans('validation.string'),
            'mobile.string' => trans('validation.string'),
            'message.string' => trans('validation.string'),
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
