<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    public const NAME_ATTRIBUTE = 'name';

    public const PHONE_ATTRIBUTE = 'phone';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_ATTRIBUTE,
        self::PHONE_ATTRIBUTE,
    ];

    public function history()
    {
        return $this->hasMany(HistoryUserGamble::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getName(): string
    {
        return $this->{self::NAME_ATTRIBUTE};
    }
}
