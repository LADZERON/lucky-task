<?php

namespace Tests\Feature\Listeners;

use App\Enums\Games;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameHistorySaveTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_listener(): void
    {

        $user = User::create([
            'name' => 'Test User',
            'phone' => 1111111111]);

        $game = new \App\Events\GamePlayed($user->id, new \App\DTO\GamblingResultDTO(true, 100), Games::LuckyNumber->value);
        $listener = new \App\Listeners\GameHistorySave();
        $listener->handle($game);

        $this->assertDatabaseHas('history_user_gambles', [
            'user_id' => $user->id,
            'game' => Games::LuckyNumber->value,
            'is_win' => true,
            'amount' => 100,
        ]);
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }
}
