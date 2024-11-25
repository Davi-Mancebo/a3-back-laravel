<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'ra' => 'nullable|string|max:12|unique:users,ra', // Correção do unique
            'password' => 'nullable|string|max:255',
            'type' => 'nullable|in:A,B,C',
        ];
    }

    public function messages()
    {
        return [
            'ra.unique' => 'este RA já está cadastrado',
            'type.in' => 'O tipo selecionado é inválido. Escolha entre A, B ou C.',
        ];
    }
}
