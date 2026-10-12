<?php

namespace App\Auth;

use App\Services\PasswordPepper;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class PepperUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials): bool
    {
        $plain = $credentials['password'] ?? '';

        return $this->hasher->check(
            PasswordPepper::apply($plain),
            $user->getAuthPassword()
        );
    }
}