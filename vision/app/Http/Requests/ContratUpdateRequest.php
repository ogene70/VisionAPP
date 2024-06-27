<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratUpdateRequest extends FormRequest
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
            'valeur_totale'=>['string'],
            'num_contrat'=>['string'],
            'nom_client'=>['string'],
            'prenom_client'=>['string'],
            'categorie'=>['string'],
            // 'Produit'=>['array'],

        ];
    }
}
