<?php

namespace Modules\AboutUs\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class AboutStoreRequest extends FormRequest
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
            'data-items' => 'nullable',
            'why_us' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png',
            'file' => 'nullable'
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
            'why_us.string' => trans('validation.string'),
            'image.mimes' => trans('validation.mimes', ['values' => 'jpeg']),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'properties' => $this->get('data-items') ? json_encode($this->get('data-items')) : null
        ]);
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
