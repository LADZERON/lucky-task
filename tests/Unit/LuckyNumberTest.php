<?php

namespace Tests\Unit;

use App\DTO\GamblingResultDTO;
use App\Gambling\LuckyNumber;
use PHPUnit\Framework\TestCase;

class LuckyNumberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function lose_test(): void
    {
        $luckyNumber = new LuckyNumber(1, 1);
        $luckyNumber->play();
        $resultDTO = new GamblingResultDTO(false, 0);
        $this->assertEquals($resultDTO, $luckyNumber->getResults());
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function min_win_test(): void
    {
        $luckyNumber = new LuckyNumber(2, 2);
        $luckyNumber->play();
        $resultDTO = new GamblingResultDTO(true, 0.2);
        $this->assertEquals($resultDTO, $luckyNumber->getResults());
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function max_win_test(): void
    {
        $luckyNumber = new LuckyNumber(1000, 1000);
        $luckyNumber->play();
        $resultDTO = new GamblingResultDTO(true, 700);
        $this->assertEquals($resultDTO, $luckyNumber->getResults());
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function average_win_test(): void
    {
        $luckyNumber = new LuckyNumber(504, 504);
        $luckyNumber->play();
        $resultDTO = new GamblingResultDTO(true, 151.2);
        $this->assertEquals($resultDTO, $luckyNumber->getResults());
    }
}
