<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

class ConfirmController extends Controller
{
    public function confirm(Guard $guard, JWTInterface $jwt, string $token)
    {
        $email = Arr::get($jwt->decode($token), 'email');

        $user = User::whereEmail($email)
            ->whereIsConfirmed(false)
            ->firstOrFail();

        $user->update([
            'is_confirmed' => true
        ]);

        return redirect(
            route('index')
        )->with('status', "Ваш E-mail &laquo;$user->email&raquo; успешно подтверждён");
    }
}
