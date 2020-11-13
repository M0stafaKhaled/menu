<?php


namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as form;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FormRequest extends form
{


    protected function failedValidation(Validator $validator)
    {
        if ($this->container['request'] instanceof Request) {
            $messages = Arr::first($validator->errors()->toArray());
            $res = [
                'status'    =>  false,
                "status_code" => 422,
                "message" => (string) reset($messages)
            ];
            throw new HttpResponseException(response()->json($res, 422));
        }
        parent::failedValidation($validator);
    }
}
