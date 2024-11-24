<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ra' => 'required|string|max:12|unique:users,ra', // Correção do unique
            'password' => 'required|string|max:255',
            'type' => 'required|in:A,B,C',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'ra.required' => 'o RA é obrigatorio',
            'ra.unique' => 'este RA já está cadastrado',
            'type.in' => 'O tipo selecionado é inválido. Escolha entre A, B ou C.',
        ];
    }
}
