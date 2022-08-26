<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'city_id' => 'required|exists:cities,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения!',
            'title.string' => 'Данные должны быть строкой!',
            'content.required' => 'Это поле необходимо для заполнения!',
            'content.string' => 'Данные должны быть строкой!',
            'preview_image.file' => 'Необходимо выбрать файл!',
            'main_image.file' => 'Необходимо выбрать файл!',
            'city_id.required' => 'Это поле необходимо для заполнения!',
            'city_id.exists' => 'Город дожен быть в базе!',
            'city_id.integer' => 'ID города должен быть число!',
        ];
    }
}
