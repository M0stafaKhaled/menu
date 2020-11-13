<?php

namespace App\Http\Requests\API;

use App\Enums\IngredientDataGender;
use App\Enums\TourismDataType;
use BenSampo\Enum\Rules\EnumValue;

class TourismDataRequest extends FormRequest
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
        $rules = [
            'national_id'   =>  'required',
        ];
        if ($this->country == 64) {
            $rules = [
                'national_id'   =>  [
                    'required',
                    'regex:/^(2|3)([0-9])([0-9])([0-1])([1-9])([0-3])([0-9])(01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)\d\d\d\d\d$/i',
                    'digits_between:14,14',
                    'numeric',
                ],
            ];
        }
        return array_merge([
            'name' => [
                'required',
                'regex:/^[\pL\s\-]+$/u',
                'min:10',
                'max:120',
            ],
            'country' => [
                'required',
                'exists:App\Country,code'
            ],
            'id_face_img'   =>  'required|image',
            'id_back_img'   =>  'required|image',
            'phone' =>  [
                'required',
                'numeric',
            ],
            'type'  =>  [
                'required',
                'numeric',
                new EnumValue(TourismDataType::class, false)
            ],
            'gender'  =>  [
                'required',
                'numeric',
                new EnumValue(IngredientDataGender::class, false)
            ],
            'ticket_number' =>  [
                'required',
                'min:4',
                'max:50',
            ],
            'trip_date' =>  [
                'required',
                'date_format:Y-m-d H:i',
                'after:today'
            ],
            'journey_from' =>  [
                'required',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'journey_to' =>  [
                'required',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'dob'   =>  [
                'required',
                'date',
                'before:' . now()->subYears(10)->format('Y-m-d')
            ],
            'job'  =>  [
                'required',
                'regex:/^[\pL\s\-]+$/u',
                'min:4',
                'max:50',
            ],
            'address'   =>  [
                'required',
                'regex:/^[\x{0621}-\x{064A}0-9 ]+$/u',
                'min:10',
                'max:120',
            ],
            'note'   =>  'nullable',
        ], $rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('Name'),
            'national_id' => __('National ID'),
            'country' => __('Country'),
            'id_face_img'   =>  __('id_face_img'),
            'id_back_img'   =>  __('id_back_img'),
            'phone' =>  __('Phone'),
            'type'  =>  __('Travel Type'),
            'gender'  =>  __('Gender'),
            'ticket_number' =>  __('Ticket Number'),
            'trip_date' =>  __('Trip Date'),
            'journey_from' =>  __('Journey From'),
            'journey_to' =>  __('Journey To'),
            'dob'   =>  __('Birthday'),
            'job'  =>  __('Job'),
            'address'   =>  __('Address'),
            'note'   =>  __('Note'),
        ];
    }
}
