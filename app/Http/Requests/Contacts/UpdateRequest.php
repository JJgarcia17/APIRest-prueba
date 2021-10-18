<?php

namespace App\Http\Requests\Contacts;

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
            'S_nombre' =>['required','string','max:45'],
            'S_puesto' =>['required','string','max:45'],
            'S_comentarios' =>['string'],
            'S_telefono_fijo' =>['string'],
            'S_telefono_movil' =>['string'],
            'S_email' =>['required','email','string','max:45']
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
