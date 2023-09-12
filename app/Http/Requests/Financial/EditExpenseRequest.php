<?php

namespace App\Http\Requests\Financial;

use Illuminate\Foundation\Http\FormRequest;

class EditExpenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['sometimes', 'date', 'before_or_equal:today'],
            'amount' => ['sometimes', 'min:0.01'],
            'description' => ['sometimes', 'string', 'max:191'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'A data deve ser uma data válida',
            'date.before_or_equal' => 'A data deve ser anterior ou igual a hoje',
            'amount.min' => 'O valor deve ser maior que 0',
            'description.max' => 'A descrição deve ter no máximo 191 caracteres',
        ];
    }
}
