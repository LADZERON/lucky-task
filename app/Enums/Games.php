<?php

namespace App\Enums;

use App\Helpers\InvokableCases;

enum Games: string
{
    use InvokableCases;
    case LuckyNumber = 'lucky_number';
}
