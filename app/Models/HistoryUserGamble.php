<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryUserGamble extends Model
{
    use HasFactory;

    public const ID_ATTRIBUTE = 'id';

    public const USER_ID_ATTRIBUTE = 'user_id';

    public const GAME_ATTRIBUTE = 'game';

    public const IS_WIN_ATTRIBUTE = 'is_win';

    public const AMOUNT_ATTRIBUTE = 'amount';

    protected $fillable = [
        self::USER_ID_ATTRIBUTE,
        self::GAME_ATTRIBUTE,
        self::IS_WIN_ATTRIBUTE,
        self::AMOUNT_ATTRIBUTE,
    ];
}
