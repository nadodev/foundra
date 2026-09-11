<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateStartupFieldRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'field' => ['required', 'string', Rule::in(['description', 'problem', 'target_customer', 'solution', 'onboarding_goal'])],
            'instruction' => ['required', 'string', 'max:1000'],
            'name' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'problem' => ['nullable', 'string', 'max:2000'],
            'target_customer' => ['nullable', 'string', 'max:255'],
            'solution' => ['nullable', 'string', 'max:2000'],
            'onboarding_goal' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'field.required' => 'Selecione um campo para gerar.',
            'field.in' => 'O campo selecionado não pode receber uma sugestão.',
            'instruction.required' => 'Descreva como você quer orientar esta sugestão.',
            'instruction.max' => 'Escreva sua orientação em até 1.000 caracteres.',
        ];
    }
}
