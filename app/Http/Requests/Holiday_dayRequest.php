<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Holiday_dayRequest extends Request
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
            'date'=>'required|unique:Holidays_days',
            'description'=>'max:50|min:5|required|unique:Holidays_days'
        ];
    }
}
