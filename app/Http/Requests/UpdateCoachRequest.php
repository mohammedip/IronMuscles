<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoachRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'specialite' => 'sometimes|string|max:255',
            'numero_telephone' => 'sometimes|string|max:20',
            'email' => 'sometimes|email|unique:coaches,email,',
            'date_recrutement' => 'sometimes|date',
        ];
    }
}
