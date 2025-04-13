<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnrainementRequest extends FormRequest
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
            'id_adherent' => 'required|exists:adherents,id',
            'date_debut' => 'required|date|after:today',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'jours' => 'required|array',
            'jours.*.exercices' => 'required|string|max:255',
            'jours.*.id_machine' => 'required|exists:machines,id',
            'jours.*.heure' => 'required',
        ];
    }
}
