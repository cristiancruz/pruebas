<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FamilyRequest extends Request
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
            'nameFamily'=>'max:30|min:2|required|unique:families',
            'description'=>'max:50|min:2|required',
           
        ];
    }
}
