<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Discount_incomeRequest extends Request
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
            'key'=>'max:10|min:1|required|unique:discounts_income',
            'description'=>'max:30|min:4|required',
            'type'=>'required'
        ];
    }
}
