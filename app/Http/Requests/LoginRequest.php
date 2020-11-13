<?php

namespace App\Http\Requests;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public  function messages()
    {
        return [
            'password.required'=> 'enter password',
            'email.required'=>'please enter email',
            'email.email'=>'you must enter valid email'
        ];
   }
}
