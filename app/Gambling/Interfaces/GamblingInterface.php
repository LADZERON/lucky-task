<?php

namespace App\Gambling\Interfaces;

use App\DTO\GamblingResultDTO;

interface GamblingInterface
{
    public function play(): void;

    public function getResults(): GamblingResultDTO;

    public function getGameType(): string;
}
