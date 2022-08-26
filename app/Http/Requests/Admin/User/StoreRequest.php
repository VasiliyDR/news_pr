<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить!',
            'email.unique' => 'Пользователь с таким email существует!',
            'email.required' => 'Это поле необходимо заполнить!',
            'email.email' => 'Неверные формат!',
            'password.required' => 'Это поле необходимо заполнить!',
        ];
    }
}
