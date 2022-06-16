<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'description' => ['required'],
            'image' => ['nullable', 'image'],
        ];
        if ($this->getMethod() == "POST") {
            $rules += [
                'name' => ['required', 'max:255', 'unique:categories',],
                'alias' => ['required', 'string', 'max:255', 'unique:categories',],
                ];
        } elseif ($this->getMethod() == "PUT") {
            $rules += [
                'name' => ['required', 'max:255', Rule::unique('categories')->ignore($this->category),],
                'alias' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($this->category),],
            ];
        }
        return $rules;
    }
}
