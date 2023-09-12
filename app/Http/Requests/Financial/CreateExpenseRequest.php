<?php

namespace App\Http\Requests\Financial;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date', 'before_or_equal:today'],
            'amount' => ['required', 'min:0.01'],
            'description' => ['required', 'string', 'max:191'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'A data é obrigatória',
            'date.date' => 'A data deve ser uma data válida',
            'date.before_or_equal' => 'A data deve ser anterior ou igual a hoje',
            'amount.required' => 'O valor é obrigatório',
            'amount.min' => 'O valor deve ser maior que 0',
            'description.required' => 'A descrição é obrigatória',
            'description.max' => 'A descrição deve ter no máximo 191 caracteres',
        ];
    }
}
