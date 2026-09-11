<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStartupSettingsRequest extends FormRequest
{
    /** @var string */
    protected $errorBag = 'startup';

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
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'sector' => ['nullable', 'string', 'max:120'],
            'is_public' => ['required', 'boolean'],
        ];
    }

    /**
     * Get the validation messages in Portuguese.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Informe o nome da startup.',
            'sector.max' => 'Informe um setor com até 120 caracteres.',
            'is_public.required' => 'Informe a visibilidade do perfil público.',
            'is_public.boolean' => 'Informe uma visibilidade válida para o perfil público.',
        ];
    }
}
