<?php

namespace App\Http\Requests;

use Armincms\Json\Json;


class RegiesterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'unique:users|required',
            'password' => 'required',

        ];
    }
  public  function messages()
  {
      return [
          'name.required' => 'please enter name',
          'email.required'=>'please enter email',
          'email.unique'  =>'enter anther email this email already registered',
          'password.required' => 'enter password',


          ];
  }
}
