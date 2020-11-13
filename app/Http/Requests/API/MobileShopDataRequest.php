<?php

namespace App\Http\Requests\API;

use App\Enums\IngredientDataGender;
use App\Enums\MobileShopDataType;
use BenSampo\Enum\Rules\EnumValue;

class MobileShopDataRequest extends FormRequest
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
            'dob'   =>  'required|date',
            'country' => [
                'required',
                'exists:App\Country,code'
            ],
            'national_id'   =>  'required',
            'id_face_img'   =>  'required|image',
            'id_back_img'   =>  'required|image',
            'phone' =>  'required|digits_between:11,11|numeric',
            'job'  =>  'required|regex:/^[\pL\s\-]+$/u',
            'address'   =>  'required|regex:/^[\pL\s\-]+$/u',
            'type'  =>  [
                'required',
                'numeric',
                new EnumValue(MobileShopDataType::class, false)
            ],
            'gender'  =>  [
                'required',
                'numeric',
                new EnumValue(IngredientDataGender::class, false)
            ],
            'device_type'    =>  'required',
            'device_color'   =>  'required',
            'device_first_imei'    =>  'required',
            'device_serial_number'    =>  'required',
            'device_second_imei'    =>  'nullable',
            'note'   =>  'nullable',
        ];
    }
}
