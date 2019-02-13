<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelaisRequest extends FormRequest
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
            'gache_id' => 'bail|required',
            'numero' => 'bail|required',
            'delaiOuverture' => 'bail|required',
            'commandeManuelle' => 'bail|required',
        ];
    }
}
