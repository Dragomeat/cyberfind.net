<?php

namespace App\Models\User;

use App\Models\User;
use App\Notifications\ConfirmEmailNotification;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

class ConfirmationObserver
{
    public function __construct(JWTInterface $jwt)
    {
        $this->jwt = $jwt;
    }

    public function created(User $user)
    {
        if (! $user->is_confirmed) {
            $confirmation = new ConfirmEmailNotification($user, $this->jwt);
            $user->notify($confirmation);
        }
    }
}