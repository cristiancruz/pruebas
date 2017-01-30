<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Petty_cash_conceptRequets extends Request
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
            'nameCash' => 'max:30|min:3|required|unique:petty_cash_concepts'
        ];
    }
}
