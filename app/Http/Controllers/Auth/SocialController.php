<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\SocialService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SocialController.
 */
class SocialController extends Controller
{
    /**
     * @param $provider
     * @return mixed
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function login($provider)
    {
        $this->validateProvider($provider);

        return Socialite::with($provider)->redirect();
    }

    /**
     * @param string $provider
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    private function validateProvider(string $provider)
    {
        if (!in_array($provider, ['facebook', 'vkontakte'], true)) {
            throw new NotFoundHttpException;
        }
    }

    /**
     * @param SocialService $service
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Database\QueryException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function callback(SocialService $service, string $provider): RedirectResponse
    {
        $this->validateProvider($provider);

        $driver = Socialite::driver($provider);

        try {
            $user = $service->createOrGetUser($driver, $provider);

            if ($user) {
                Auth::login($user, true);
            }
        } catch (QueryException $e) {
            $error = [
                'sqlstate' => $e->errorInfo[0],
                'code' => $e->errorInfo[1],
            ];

            if ($error['sqlstate'] === '23000' && $error['code'] === 1062) {
                return redirect(route('index'))
                    ->with([
                        'status' => [
                            'message' => 'Данная почта уже занята!',
                            'type' => 'error',
                        ],
                    ]);
            }

            throw $e;
        }

        return redirect()->intended('/');
    }
}
