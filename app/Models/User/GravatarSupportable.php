<?php

declare(strict_types=1);

namespace App\Models\User;

/**
 * Class GravatarSupportable
 * @package App\Models\User
 */
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
