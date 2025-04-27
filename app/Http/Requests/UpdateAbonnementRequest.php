<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbonnementRequest extends FormRequest
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
            'type_Abonnement' => 'sometimes|in:Mensuel,Trimestriel,Semi-annuel,Annuel',
            'prix' => 'sometimes|numeric|min:0',
            'date_Debut' => 'sometimes|date|before:date_Fin',
            'date_Fin' => 'sometimes|date|after:date_Debut',
        ];
    }
}
