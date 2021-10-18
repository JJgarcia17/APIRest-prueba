<?php

namespace App\Http\Requests\Corporate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterResquest extends FormRequest
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
            'user_id' => ['required','exists:users,id'],
            'S_nombre_corto' => ['required','string','max:45'],
            'S_nombre_completo' =>['required','string','max:45','unique:corporates'],
            'S_logo_url'=>['required','string','max:255'],
            'S_db_name' =>['required','string','max:45'],
            'S_db_usuario' => ['required','string','max:45'],
            'S_db_password' =>['required','string','max:45'],
            'S_system_url'=>['required','string','max:255'],
            'S_activo' => ['required','boolean'],
            'D_fecha_incorporacion'=> ['required','date']
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
