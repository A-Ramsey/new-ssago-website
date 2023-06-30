<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EventBookingStageTypeEnum extends Enum
{
    const Form = 0;
    const EmergencyInformation = 1;
    const Transport = 2;
    const Activities = 3;
    const Test = -1;
}
