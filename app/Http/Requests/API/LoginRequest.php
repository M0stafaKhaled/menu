<?php

namespace App\Http\Requests\API;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'device_id' => 'required',
            'device_imei' => 'required',
            'device_name'   =>  'required'
        ];
    }

}
