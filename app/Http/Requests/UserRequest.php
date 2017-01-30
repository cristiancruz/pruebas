<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'username'=> 'max:30|min:2|required|unique:Users',
            'name'=> 'max:30|min:2|required',
            'password'=> 'max:30|min:2|required',
            'bank_id'=> 'required',
            'profile_id'=> 'required',
            'email'=> 'email'
        ];
    }
}
