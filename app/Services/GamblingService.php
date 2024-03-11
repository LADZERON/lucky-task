<?php

namespace App\Services;

use App\DTO\GamblingResultDTO;
use App\Events\GamePlayed;
use App\Gambling\Interfaces\GamblingInterface;
use App\Models\User;

class GamblingService
{
    public function luckyNumberPlay(User $user, GamblingInterface $gamblingInterface): GamblingResultDTO
    {
        $gamblingInterface->play();
        $resultOfGame = $gamblingInterface->getResults();
        $this->saveResult($user, $resultOfGame, $gamblingInterface->getGameType());

        return $resultOfGame;
    }

    protected function saveResult(User $user, GamblingResultDTO $result, string $gameType)
    {
        event(new GamePlayed($user->id, $result, $gameType));
    }
}
