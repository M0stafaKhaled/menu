<?php

namespace App\Http\Requests\API;

use App\Enums\CarDataType;
use App\Enums\IngredientDataGender;
use BenSampo\Enum\Rules\EnumValue;

class CarDataRequest extends FormRequest
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
            'national_id'   =>  'required',
            'id_face_img'   =>  'required|image',
            'id_back_img'   =>  'required|image',
            'customer_driving_licence'   =>  'required|image',
            'car_image'   =>  'required|image',
            'phone' =>  'required|digits_between:11,11|numeric',
            'dob'   =>  'required|date',
            'job'  =>  'required|regex:/^[\pL\s\-]+$/u',
            'motor_number'  =>  'required|alpha_num',
            'chases_number'  =>  'required|alpha_num',
            'type'  =>  [
                'required',
                'numeric',
                new EnumValue(CarDataType::class, false)
            ],
            'gender'  =>  [
                'required',
                'numeric',
                new EnumValue(IngredientDataGender::class, false)
            ],
            'address'   =>  'required|regex:/^[\pL\s\-]+$/u',
            'car_licence_text'    =>  'required|regex:/^[\pL\s\-]+$/u|min:3|max:10',
            'car_licence_number'   =>  'required|numeric',
            'note'   =>  'nullable',
        ];
    }
}
