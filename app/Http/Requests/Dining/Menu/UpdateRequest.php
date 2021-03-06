<?php

namespace App\Http\Requests\Dining\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
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
        // return true;
        //업데이트하려는 다이닝 메뉴를 작성한 쉐프로 로그인 햇을때만 권한 부여.

        $loginedUser = Auth::user();

        return $loginedUser->user_type === 'chef' && (

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
