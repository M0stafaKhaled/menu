<?php

namespace App\Http\Requests\API;

use App\Enums\IngredientDataGender;
use BenSampo\Enum\Rules\EnumValue;

class HotelDataRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'country' => [
                'required',
                'exists:App\Country,code'
            ],
            'gender'  =>  [
                'required',
                'numeric',
                new EnumValue(IngredientDataGender::class, false)
            ],
            'national_id'   =>  'required',
            'id_face_img'   =>  'required|image',
            'id_back_img'   =>  'required|image',
            'phone' =>  'required|digits_between:11,11|numeric',
            'dob'   =>  'required|date',
            'job'  =>  'required|regex:/^[\pL\s\-]+$/u',
            'address'   =>  'required|regex:/^[\pL\s\-]+$/u',
            'note'   =>  'nullable',
        ];
    }
}
