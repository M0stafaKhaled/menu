<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum implements LocalizedEnum
{
    const User = 0;
    const kitchen = 1;
    const Admin = 2;

    public static function getLocalizationKey(): string
    {
        return 'User_type';
    }
}
