<?php

namespace App\Http\Requests\Dining\Chef;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    // can access chef member who is 'logined' and 'chefprofile null === false'
    {
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
            //
        ];
    }
}
