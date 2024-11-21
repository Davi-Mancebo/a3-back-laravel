<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Retorne true para permitir todos os usuários ou adicione uma lógica de autorização.
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
            'name' => 'required|string|max:255',
            'cellphone' => 'nullable|string|max:15',
            'date_birth' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'email' => 'nullable|email|max:255',
            'SOS_phone' => 'nullable|string|max:15',
            'scholarship' => 'nullable|string|max:255',
            'work' => 'nullable|string|max:255',
            'special_cases' => 'nullable|in:case1,case2,case3',  // Ajuste conforme o ENUM
        ];
    }

    /**
     * Customiza as mensagens de erro, caso necessário.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.email' => 'O e-mail fornecido não é válido.',
            'special_cases.in' => 'O caso especial selecionado é inválido.',
        ];
    }
}
