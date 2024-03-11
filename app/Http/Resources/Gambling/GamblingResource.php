<?php

namespace App\Http\Resources\Gambling;

use App\Enums\GameStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GamblingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => __('game.game_result', ['amount' => $this->resource->amount, 'status' => $this->resource->isWin ? GameStatus::Win->value : GameStatus::Lose->value]),
        ];
    }
}
