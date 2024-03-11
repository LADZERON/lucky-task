<?php

namespace App\DTO;

class GamblingResultDTO
{
    public function __construct(
        public bool $isWin,
        public float $amount,
    ) {
    }
}
