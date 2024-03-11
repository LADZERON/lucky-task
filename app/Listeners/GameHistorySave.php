<?php

namespace App\Listeners;

use App\Events\GamePlayed;
use App\Models\HistoryUserGamble;
use App\Models\User;

class GameHistorySave
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GamePlayed $event): void
    {
        $user = User::find($event->userId);

        HistoryUserGamble::create([
            HistoryUserGamble::USER_ID_ATTRIBUTE => $user->id,
            HistoryUserGamble::GAME_ATTRIBUTE => $event->gameType,
            HistoryUserGamble::IS_WIN_ATTRIBUTE => $event->result->isWin,
            HistoryUserGamble::AMOUNT_ATTRIBUTE => $event->result->amount,
        ]);
    }
}
