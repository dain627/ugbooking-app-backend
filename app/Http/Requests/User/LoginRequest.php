<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'user_id' => 'required|string|exists:users,user_id',
            'password' => 'required|string'
        ];
    }
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(

            response()->json([
                'login' => false,
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
