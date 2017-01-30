<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Company_social_reasonRequest extends Request
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
            'companyReason'=>'max:40|min:5|required|unique:company_social_reason',
            'rfc'=>'max:13|min:12|required|unique:company_social_reason',
            'logoEnterprice'=>'mimes:jpeg,png|max:100'
        ];
    }
}
