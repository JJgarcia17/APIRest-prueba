<?php

namespace App\Http\Requests\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required','string','max:45'],
            'email' => ['required','email','unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'S_activo' => ['required','boolean'],
            'verifed' =>['required','string']
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
