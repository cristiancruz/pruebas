<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request
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
             'nameProject'=>'max:60|min:5|required|unique:projects',
             'client_id'=>'required',
             'client_social_reason_id'=>'required',
             'company_social_reason_id'=>'required',
            'dateStart'=>'required',
            'dateEnd'=>'required',
            'estimation'=>'required',
            'estimationDay'=>'required',
            'invoice'=>'required',
            'invoiceDay'=>'required',
            'pay'=>'required',
            'payDay'=>'required',
            'location'=>'required',
            'alias'=>'max:5|min:2|required'
        ];
    }
}
