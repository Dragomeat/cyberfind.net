<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Models\User;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;
use App\Notifications\ConfirmEmailNotification;

class ConfirmationObserver
{
    /**
     * ConfirmationObserver constructor.
     * @param JWTInterface $jwt
     */
    public function __construct(JWTInterface $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * @param \App\Models\User $user
     */
    public function created(User $user)
    {
        if (!$user->is_confirmed) {
            $confirmation = new ConfirmEmailNotification($user, $this->jwt);
            $user->notify($confirmation);
        }
    }
}
