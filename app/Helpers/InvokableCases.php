<?php

namespace App\Helpers;

trait InvokableCases
{
    public function invoke()
    {
        return $this->value;
    }

    public static function __callStatic($name, $arguments)
    {
        return collect(static::cases())->firstWhere('name', $name)->value;
    }
}
