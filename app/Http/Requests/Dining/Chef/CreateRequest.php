<?php

namespace App\Http\Requests\Dining\Chef;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $loginedUser = Auth::user(); // 1. loginedUser

        return $loginedUser->user_type === 'admin'||'chef' &&
        (is_null($loginedUser->chef)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //  $willCreateChef_Profile = request()->only([
            'business_name' => 'required|string|min:8|max:20',
            'experience' => 'required|string',
            'introduction' => 'required|string',
            'business_number' => 'required|numeric',
            'identify_photo'=> 'required|string'
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
    }

}

