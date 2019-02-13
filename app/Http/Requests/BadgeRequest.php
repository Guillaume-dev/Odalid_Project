<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BadgeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'nom' => 'bail|required',
            'prenom' => 'bail',
            'email' => 'bail|required',
            'dateDeNaissance' => 'bail',
            'numeroIdentite' => 'bail',
            'sexe' => 'bail',
            'type' => 'bail',
            'groupe' => 'bail',
            'dateDeValidite' => 'bail|required',
        ];
    }
}
