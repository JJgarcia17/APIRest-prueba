<?php

namespace App\Http\Requests\User;
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
            
            'username' => ['required','string','max:45'],
            'email' => ['required','email','unique:users,email,'.$this->route('user')->id],
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
