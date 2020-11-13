<?php

namespace App\Rules;

use App\MenuDetails;
use Illuminate\Contracts\Validation\Rule;

class CreateMenu implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        return   !(MenuDetails::all()->count() ==1); 
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
     return   !(MenuDetails::all()->count() ==1); 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
