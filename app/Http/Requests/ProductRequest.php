<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' => ['required', 'numeric'],
            'description' => ['nullable'],
            'short_desc' => ['nullable'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'numeric'],
        ];
        if ($this->getMethod() == "POST") {
            $rules += [
                'name' => ['required', 'max:255', 'unique:products',],
                'alias' => ['required', 'string', 'max:255', 'unique:products',],
                ];
        } elseif ($this->getMethod() == "PUT") {
            $rules += [
                'name' => ['required', 'max:255', Rule::unique('products')->ignore($this->product),],
                'alias' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($this->product),],
            ];
        }
        return $rules;
    }
}
