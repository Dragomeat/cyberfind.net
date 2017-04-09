<?php

namespace App\Models\User;

use App\Models\User;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;
use App\Notifications\ConfirmEmailNotification;

class ConfirmationObserver
{
    public function __construct(JWTInterface $jwt)
    {
        $this->jwt = $jwt;
    }

    public function created(User $user)
    {
        if (!$user->is_confirmed) {
            $confirmation = new ConfirmEmailNotification($user, $this->jwt);
            $user->notify($confirmation);
        }
    }
}
