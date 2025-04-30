<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:product_categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название категории обязательно для заполнения',
            'title.max' => 'Название не должно превышать 255 символов',

            'parent_id.exists' => 'Указанная родительская категория не существует'
        ];
    }
}
