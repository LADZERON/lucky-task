<?php

use App\Models\HistoryUserGamble;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_user_gambles', function (Blueprint $table) {
            $table->id();
            $table->foreignId(HistoryUserGamble::USER_ID_ATTRIBUTE)->constrained('users');
            $table->string(HistoryUserGamble::GAME_ATTRIBUTE);
            $table->boolean(HistoryUserGamble::IS_WIN_ATTRIBUTE);
            $table->float(HistoryUserGamble::AMOUNT_ATTRIBUTE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_user_gambles');
    }
};
