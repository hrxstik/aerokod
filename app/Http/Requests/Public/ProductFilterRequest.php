<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1|max:6',
        ];
    }

    public function messages(): array
    {
        return [
            'page.integer' => 'Параметр страницы должен быть целым числом',
            'page.min' => 'Номер страницы не может быть меньше 1',
            'per_page.integer' => 'Количество элементов на странице должно быть целым числом',
            'per_page.min' => 'Количество элементов на странице не может быть меньше 1',
            'per_page.max' => 'Количество элементов на странице не может быть больше 6',
        ];
    }
}
