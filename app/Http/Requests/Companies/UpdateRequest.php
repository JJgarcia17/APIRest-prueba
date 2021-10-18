<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
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
            'corporate_id' =>['required','exists:corporates,id'.$this->get('id')],
            'S_razon_social' =>['string','required','max:13'],
            'S_rfd' =>['string','max:75'],
            'S_pais' =>['string','max:75'],
            'S_estado' =>['string','max:75'],
            'S_municipio' =>['string','max:75'],
            'S_colonia_localidad' =>['string','max:75'],
            'S_domicilio' =>['string','max:100'],
            'S_codigo_postal' =>['string','max:5'],
            'S_uso_cfdi' =>['string','max:45'],
            'S_url_rfc' =>['string','max:255'],
            'S_url_acta_constitutiva' =>['string','max:255'],
            'activo' =>['required','boolean'],
            'S_comentarios' =>['string','max:255']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json([
            'status' => 422,
            'message' => 'The given data was invalid.',
            'errors' => $errors->messages(),
        ], 422);
    
        throw new HttpResponseException($response);
    }
}
