<?php

namespace App\Http\Requests\API;

class RegisterDeviceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'device_id' => 'required',
            'device_imei' => 'required'
        ];
    }
}
