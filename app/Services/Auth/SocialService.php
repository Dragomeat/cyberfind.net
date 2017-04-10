<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;
use App\Models\UserSocial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Two\ProviderInterface;

/**
 * Class SocialService
 * @package App\Services\Auth
 */
class SocialService
{
    /**
     * @param ProviderInterface $provider
     * @param string $providerName
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function createOrGetUser(ProviderInterface $provider, string $providerName)
    {
        /**
         * @var ProviderInterface
         */
        $socialUser = $provider->user();

        $accountData = [
            'provider_user_id' => $socialUser->getId(),
            'provider' => $providerName,
        ];

        /**
         * @var UserSocial
         */
        $account = UserSocial::firstOrNew($accountData, $accountData);

        if (!is_null($account->user)) {
            return $account->user;
        }

        $user = User::firstOrCreate([
            'id' => Auth::id(),
        ], [
            'login' => $socialUser->getNickname() ?? $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'password' => bcrypt(
                Str::random()
            ),
        ]);

        $account->user()
            ->associate($user)
            ->save();

        return $user;
    }
}
