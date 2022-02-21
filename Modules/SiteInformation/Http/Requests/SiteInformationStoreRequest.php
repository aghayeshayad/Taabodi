<?php

namespace Modules\SiteInformation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInformationStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'aboutUs.description'=>'required|string',
            'aboutUs.image'=>'nullable',
            'contactUs.phone' => 'nullable|min:11|max:11',
            'contactUs.phone1' => 'nullable|min:11|max:11',
            'contactUs.email' => 'nullable|email',
            'contactUs.address' => 'nullable',
            'contactUs.lat' => 'nullable',
            'contactUs.lan' => 'nullable',
            'contactUs.link_map' => 'nullable',
            'socials.*.type' => 'nullable|integer',
            'socials.*.link' => 'nullable|string',
            'options.*.title' => 'nullable|string',
            'options.*.description' => 'nullable|string',
            'options.*.image' => 'nullable|mimes:jpeg,svg,png',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
//            'aboutUs' => $this->get('aboutUs') ? json_encode($this->get('aboutUs')) : null,
            'contactUs' => $this->get('contactUs') ? json_encode($this->get('contactUs')) : null,
            'socials' => $this->get('socials') ? json_encode($this->get('socials')) : null,
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
