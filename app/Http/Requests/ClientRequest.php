<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientRequest extends Request
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
            //
            'name'=>'max:50|min:5|required|unique:clients',
            'numberClient'=>'max:13|min:1|required|unique:clients',
            'logoClient'=>'mimes:jpeg,png|max:1000',
            'status'=>'required',
            'phoneContact'=>'digits_between:8,10',
            'cellContact'=>'digits:10',
            'email'=>'email',

            'nameReason'=>'max:60|min:4|required|unique:client_social_reasons',
            'rfc'=>'max:13|min:12|required|unique:client_social_reasons',
            'numberE'=>'integer',
            'numberI'=>'integer',

        ];
    }
}
