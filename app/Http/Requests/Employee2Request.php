<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Employee2Request extends Request
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
            'job_id'=>'required',
            'dateStart'=>'required',
            'name'=>'max:30|min:2|required',
            'lastName'=>'max:30|min:2|required',
            'motherLastName'=>'max:30|min:2|required',
            'imss'=>'required|numeric',
            'curp'=>'max:18|min:18|required',
            'rfc'=>'max:13|min:12|required',
            'dailySalary'=>'required|numeric',
            'dailyInfonavit'=>'required|numeric'
        ];
    }
}
