<?php

namespace App\Http\Requests\Dining\Menu;

use App\Models\ChefProfile;
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
        $loginedUser = Auth::user();

        return $loginedUser->user_type === 'chef' && (

            // 1. loginedUser

            is_null($loginedUser->chef) === false

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
            'dining_category' => 'required|string|in:category1,category2,category3,category4,category5,category6',
            'menu_image' => 'required|string',
            'menu_title' => 'required|string',
            'menu_description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'availability'=> 'required|string',
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
