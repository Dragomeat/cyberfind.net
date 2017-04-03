<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\SocialService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SocialController extends Controller
{
    public function login($provider)
    {
        $this->validateProvider($provider);

        return Socialite::with($provider)->redirect();
    }

    public function callback(SocialService $service, $provider)
    {
        $this->validateProvider($provider);

        $driver = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);

        if ($user) {
            Auth::login($user, true);
        }

        return redirect()->intended('/');
    }

    private function validateProvider(string $provider)
    {
        if (!in_array($provider, ['facebook', 'vkontakte'])) {
            throw new NotFoundHttpException;
        }
    }
}
