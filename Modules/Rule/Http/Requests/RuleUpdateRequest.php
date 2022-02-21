<?php

namespace Modules\Rule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = (new RuleStoreRequest())->rules();

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
