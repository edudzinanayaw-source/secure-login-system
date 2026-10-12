<?php

namespace App\Services;

class PasswordPepper
{
    public static function apply(string $password): string
    {
        return hash_hmac(
            'sha256',
            $password,
            config('app.password_pepper')
        );
    }
}