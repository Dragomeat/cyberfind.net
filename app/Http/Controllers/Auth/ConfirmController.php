<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

/**
 * Class ConfirmController
 * @package App\Http\Controllers\Auth
 */
class ConfirmController extends Controller
{
    /**
     * @param Guard $guard
     * @param JWTInterface $jwt
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function confirm(Guard $guard, JWTInterface $jwt, string $token): RedirectResponse
    {
        $email = Arr::get($jwt->decode($token), 'email');

        /**
         * @var \App\Models\User $user
         */
        $user = User::whereEmail($email)
            ->whereIsConfirmed(false)
            ->firstOrFail();

        $user->update([
            'is_confirmed' => true,
        ]);

        return redirect(
            route('index')
        )->with('status', "Ваш E-mail &laquo;$user->email&raquo; успешно подтверждён");
    }
}
