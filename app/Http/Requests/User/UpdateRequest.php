<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $loginedUser = Auth::user();

        return $loginedUser->user_type === 'admin';
        // Access admin user only
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|string|min:4|max:10|unique:users,user_id',
            'password' => 'required|string|min:8|max:20',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'contact_number' => 'required|numeric',
            'user_type' => 'required|string|in:chef,customer,admin'
        ];
    }
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(

            response()->json([
                'asdf' => false,
                'errors' => $validator->errors()
            ], 422)
        );
        // $this->throwUnProcessableEntityException(ValidMessage::first($validator));
    }
}
