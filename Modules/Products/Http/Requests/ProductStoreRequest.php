<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'tags' => 'sometimes|array',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'sometimes|exists:categories,id',
            'sub_subcategory_id' => 'sometimes|exists:categories,id',
            'description' => 'required|string',
            // 'discount' => 'sometimes|integer|between:1,100',
            // 'discount_count' => 'sometimes|integer',
            // 'informations.*' => 'sometimes|array',
            // 'prices.*.color' => 'sometimes|string',
            // 'prices.*.volume' => 'sometimes|string',
            // 'prices.*.size' => 'sometimes|string',
            // 'prices.*.count_in_box' => 'sometimes|integer',
            // 'prices.*.count' => 'sometimes|integer',
            // 'prices.*.price' => 'sometimes|integer',
            // 'prices.*.unit' => 'sometimes',
            // 'prices.*.width' => 'sometimes|integer',
            // 'prices.*.height' => 'sometimes|integer',
            // 'prices.*.round' => 'sometimes|integer',
            // 'prices.*.diameter' => 'sometimes|integer',
            // 'prices.*.angle' => 'sometimes|integer',
            // 'prices.*.shead' => 'sometimes',
            // 'prices.*.type' => 'sometimes',
            'image' => 'required|mimes:jpg,bmp,png',
            'brand' => 'nullable|string'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => ($this->get('status') && $this->get('status') == 'on') ? 1 : 0,
            'best_sellers' => ($this->get('best_sellers') && $this->get('best_sellers') == 'on') ? 1 : 0,
            'vip' => ($this->get('vip') && $this->get('vip') == 'on') ? 1 : 0
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
