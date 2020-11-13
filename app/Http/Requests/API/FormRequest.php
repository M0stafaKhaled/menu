<?php

namespace App\Http\Requests\API;

use Dingo\Api\Http\FormRequest as Form;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FormRequest extends Form
{
    protected function failedValidation(Validator $validator)
    {
        if ($this->container['request'] instanceof Request) {
            $messages = Arr::first($validator->errors()->toArray());

            $res = [
                'status'    =>  false,
                "status_code" => 422,
                "error" => (string) reset($messages)
            ];

            throw new HttpResponseException(response()->json($res, 422));
        }

        parent::failedValidation($validator);
    }
}
