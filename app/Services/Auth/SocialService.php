<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 18:38
 */

namespace App\Services\Auth;

use App\Models\User;
use App\Models\UserSocial;
use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use SocialiteProviders\Manager\Contracts\OAuth2\ProviderInterface;

class SocialService
{
    public function createOrGetUser(ProviderInterface $provider, string $providerName)
    {
        $socialUser = $provider->user();

        $accountData = [
            'provider_user_id' => $socialUser->getId(),
            'provider' => $providerName
        ];

        /**
         * @var UserSocial $account
         */
        $account = UserSocial::firstOrNew($accountData, $accountData);

        if (!is_null($account->user)) {
            return $account->user;
        }

        try {
            /**
             * @var User $user
             */
            $user = User::create([
                'login' => $socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(
                    Str::random()
                )
            ]);
        } catch (QueryException $e) {
            return null;
        }

        $account->user()
            ->associate($user)
            ->save();

        return $user;
    }
}