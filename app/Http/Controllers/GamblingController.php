<?php

namespace App\Http\Controllers;

use App\Gambling\LuckyNumber;
use App\Http\Resources\Gambling\GamblingResource;
use App\Services\GamblingService;

/**
 * Controller of gambling games
 * @package App\Http\Controllers
 */
class GamblingController extends Controller
{
    public function luckyNumber(GamblingService $gamblingService): GamblingResource
    {
        $luckyNumber = $gamblingService->luckyNumberPlay($this->user, new LuckyNumber());

        return new GamblingResource($luckyNumber);
    }
}
