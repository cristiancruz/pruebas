<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Client_social_reasonRequest extends Request
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
            'nameReason'=>'max:60|min:4|required|unique:client_social_reasons',
            'rfc'=>'max:13|min:12|required|unique:client_social_reasons',
            'street'=>'integer',
            'numberE'=>'integer',
            'numberI'=>'integer',
        ];
    }
}
