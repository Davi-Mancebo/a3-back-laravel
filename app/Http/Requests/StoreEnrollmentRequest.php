<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollmentRequest extends FormRequest
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
            'student_id' => 'nullable|numeric',
            'professor_id'=> 'required|numeric',
            'client_id'=> 'required|numeric',
            'familiar_historic'=> 'nullable|string',
            'social_historic'=> 'nullable|string',
            'is_active'=> 'required|boolean',
        ];
    }

    public function messages(){
        return [
            'professor_id.required'=> 'o professor é obrigatorio',
            'client_id.required' => 'O Cliente é obrigatorio',
            'is_active.required' => 'O status do agendamento é obrigatorio',
        ];
    }
}
