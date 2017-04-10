<?php

declare(strict_types=1);

namespace App\Models\Traits;

/**
 * Class GetsUrlSocialNetworks.
 */
trait GetsUrlSocialNetworks
{
    /**
     * @return null|string
     */
    public function getVkontakteUrlAttribute()
    {
        if ($vkontakte = $this->getSocialNetworkByProvider('vkontakte')) {
            return sprintf(
                'https://vk.com/id%d',
                $vkontakte->provider_user_id
            );
        }

        return null;
    }

    /**
     * @return null|string
     */
    public function getFacebookUrlAttribute()
    {
        if ($facebook = $this->getSocialNetworkByProvider('facebook')) {
            return sprintf(
                'https://www.facebook.com/app_scoped_user_id/%d',
                $facebook->provider_user_id
            );
        }

        return null;
    }
}
