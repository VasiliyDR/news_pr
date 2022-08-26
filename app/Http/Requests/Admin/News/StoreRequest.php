<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'city_id' => 'required|integer|exists:cities,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения!',
            'title.string' => 'Данные должны быть строкой!',
            'content.required' => 'Это поле необходимо для заполнения!',
            'content.string' => 'Данные должны быть строкой!',
            'preview_image.required' => 'Это поле необходимо для заполнения!',
            'preview_image.file' => 'Необходимо выбрать файл!',
            'main_image.required' => 'Это поле необходимо для заполнения!',
            'main_image.file' => 'Необходимо выбрать файл!',
            'city_id.required' => 'Это поле необходимо для заполнения!',
            'city_id.exists' => 'Город дожен быть в базе!',
            'city_id.integer' => 'ID города должен быть число!',
        ];
    }
}
