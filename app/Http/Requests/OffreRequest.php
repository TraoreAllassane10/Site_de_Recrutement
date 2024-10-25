<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OffreRequest extends FormRequest
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
            "titre" => "required",
            "description" => "required"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "error" => true,
            "msg" => "Erreur de validation",
            "errorList"=> $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            "titre.required" => "Entrer le titre de l'offre",
            "description.required" => "Entrer la description de l'offre"
        ];
    }
}
