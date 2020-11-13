<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class OrderStatus extends Enum implements LocalizedEnum
{
    const  Cart = 0;
    const  new  = 1;
    const  cancel= 2;
    const processing=3;
    const Finish =4;
    public static function getLocalizationKey(): string
    {
        return 'status';
    }
}
