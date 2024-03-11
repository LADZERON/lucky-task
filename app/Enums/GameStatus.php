<?php

namespace App\Enums;

use App\Helpers\InvokableCases;

enum GameStatus: string
{
    use InvokableCases;
    case Win = 'Win';
    case Lose = 'Lose';
}
