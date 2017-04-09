<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 21:09.
 */

namespace App\Models\Traits;

trait GetsUrlSocialNetworks
{
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
