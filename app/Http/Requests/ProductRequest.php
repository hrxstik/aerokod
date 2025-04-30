<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,'.$this->product?->id,
            'description' => 'nullable|string',
            'category_id' => 'required|exists:product_categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название продукта обязательно для заполнения',
            'title.max' => 'Название не должно превышать 255 символов',

            'slug.required' => 'Slug обязателен для заполнения',
            'slug.unique' => 'Такой slug уже используется другим продуктом',

            'category_id.required' => 'Необходимо указать категорию',
            'category_id.exists' => 'Указанная категория не существует'
        ];
    }
}
