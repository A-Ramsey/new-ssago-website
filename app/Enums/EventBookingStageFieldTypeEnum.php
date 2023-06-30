<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EventBookingStageFieldTypeEnum extends Enum
{
    const Input = 0;
    const Number = 1;
    const Select = 2;
    const CheckBox = 3;
    const Currency = 4;
    const DateTime = 5;
    const TextArea = 6;
}
