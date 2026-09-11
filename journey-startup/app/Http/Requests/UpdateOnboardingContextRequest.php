<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOnboardingContextRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'onboarding_stage' => ['required', 'string', Rule::in(['idea', 'program', 'post_program', 'mvp'])],
            'onboarding_goal' => ['required', 'string', 'max:1000'],
        ];
    }

    /**
     * Get the validation messages in the application's language.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'onboarding_stage.required' => 'Escolha o momento atual da sua jornada.',
            'onboarding_stage.in' => 'Escolha uma opção válida para o momento da jornada.',
            'onboarding_goal.required' => 'Conte o que você quer alcançar agora.',
            'onboarding_goal.max' => 'Descreva seu objetivo em até 1.000 caracteres.',
        ];
    }
}
