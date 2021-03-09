<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriminalRequest extends FormRequest
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
            'cin' => 'required|string|unique:criminals|max:10|min:6',
            'nom' => 'required|string|max:50|min:4',
            'prenom' => 'required|string|max:60|min:3',
//            'photo' => 'string|max:2000|unique:criminals',
            'dateNaissance'=>'required|date',
            'ville'=>'required|string|max:50|min:3',
            'tel'=>'required|string|min:10'
        ];
    }
}
