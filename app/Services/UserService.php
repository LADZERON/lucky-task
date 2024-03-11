<?php

namespace App\Services;

use App\DTO\GamblingResultDTO;
use App\Models\HistoryUserGamble;
use App\Models\User;

class UserService
{
    public function getHistory(User $user): array
    {
        return $user->history()
            ->select([
                HistoryUserGamble::IS_WIN_ATTRIBUTE,
                HistoryUserGamble::AMOUNT_ATTRIBUTE,
            ])
            ->latest()
            ->take(3)
            ->get()
            ->map(
                fn ($history) => new GamblingResultDTO(
                    $history->is_win,
                    $history->amount)
            )->toArray();
    }
}
