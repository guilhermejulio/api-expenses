<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.max' => 'Nome deve ter no máximo 255 caracteres',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email deve ser um email válido',
            'email.unique' => 'Email já cadastrado',
            'email.max' => 'Email deve ter no máximo 255 caracteres',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha deve ter no mínimo 6 caracteres',
            'password.max' => 'Senha deve ter no máximo 255 caracteres',
        ];
    }
}
