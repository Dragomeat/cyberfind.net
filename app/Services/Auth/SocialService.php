<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 18:38.
 */

namespace App\Services\Auth;

use App\Models\User;
use App\Models\UserSocial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SocialiteProviders\Manager\Contracts\OAuth2\ProviderInterface;

class SocialService
{
    public function createOrGetUser($provider, string $providerName)
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
