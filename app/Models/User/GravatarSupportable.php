<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 10:35.
 */

namespace App\Models\User;

trait GravatarSupportable
{
    /**
     * @return string
     */
    public function getEmailForGravatar(): string
    {
        return $this->email;
    }
}
