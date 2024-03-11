<?php

namespace App\Gambling;

use App\DTO\GamblingResultDTO;
use App\Enums\Games;
use App\Gambling\Interfaces\GamblingInterface;

/**
 * Get a random number and calculate the win if the number is even
 * @package App\Gambling
 */
class LuckyNumber implements GamblingInterface
{
    protected int $number;

    protected float $sumOfWin;

    public function __construct(
        protected int $minRandNumber = 1,
        protected int $maxRandNumber = 1000,
        protected int $maxProcentaigOfWin = 70,
        protected int $minProcentaigOfWin = 10,
        protected int $gradationOfWin = 20,
        protected int $gradationOfNumber = 300,
        protected int $numberAfterGetMaxProcentaigOfWin = 900,
        protected int $maxNumberToGetMinProcentaigOfWin = 300,
        protected int $procentaigDelimiter = 100,
    ) {
        //
    }

    public function getGameType(): string
    {
        return Games::LuckyNumber->value;
    }

    public function play(): void
    {
        $this->number = $this->setRandNumber();
        $this->sumOfWin = $this->processingResultOfNumber();
    }

    public function getResults(): GamblingResultDTO
    {
        return new GamblingResultDTO(
            $this->sumOfWin > 0 ? true : false,
            $this->sumOfWin
        );
    }

    protected function setRandNumber(): int
    {
        return rand($this->minRandNumber, $this->maxRandNumber);
    }

    protected function processingResultOfNumber(): float
    {
        if ($this->number % 2 !== 0) {
            return 0;
        }

        return match (true) {
            $this->number < $this->maxNumberToGetMinProcentaigOfWin => $this->calculateWin($this->number, $this->minProcentaigOfWin),
            $this->number > $this->numberAfterGetMaxProcentaigOfWin => $this->calculateWin($this->number, $this->maxProcentaigOfWin),
            default => $this->calculateWin($this->number, $this->calculateProcentageOfWin()),
        };
    }

    /**
     * Calculate available procentage of win
     */
    protected function calculateProcentageOfWin(): int
    {
        $closest = null;
        
        // calculate the raw procentage
        $rawProcentage = $this->number / $this->gradationOfNumber * $this->gradationOfWin;

        // iterate through the available procentaiges
        foreach ($this->createArrayOfAvailableProcentaiges() as $item) {

            // if we have a new closest number, or the number is equal to the closest number, but less than it
            if (
                $closest === null ||
                abs($rawProcentage - $item) < abs($rawProcentage - $closest) ||
                (abs($rawProcentage - $item) == abs($rawProcentage - $closest) &&
                $item < $closest)) {
                $closest = $item;
            }
        }

        return $closest;
    }

    protected function createArrayOfAvailableProcentaiges(): array
    {
        return range($this->minProcentaigOfWin, $this->maxProcentaigOfWin, $this->gradationOfWin);
    }

    protected function calculateWin(int $number, int $procentage): float
    {
        return $number * $procentage / $this->procentaigDelimiter;
    }
}
