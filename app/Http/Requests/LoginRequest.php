<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permitir acesso a todos
    }

    /**
     * Regras de validação.
     */
    public function rules(): array
    {
        return [
            'ra' => 'required|string|exists:users,ra', // Verifica se o RA existe no banco
            'password' => 'required|string',
        ];
    }

    /**
     * Mensagens personalizadas.
     */
    public function messages(): array
    {
        return [
            'ra.required' => 'O RA é obrigatório.',
            'ra.exists' => 'O RA fornecido não foi encontrado.',
            'password.required' => 'A senha é obrigatória.',
        ];
    }
}
