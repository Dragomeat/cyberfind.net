<?php

declare(strict_types=1);

namespace App\Models\User;

use CommerceGuys\Enum\AbstractEnum;

/**
 * Class Gender.
 */
final class Gender extends AbstractEnum
{
    public const MALE = 'male';
    public const FEMALE = 'female';
    public const UNKNOWN = 'unknown';
}
