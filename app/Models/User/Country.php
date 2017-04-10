<?php

declare(strict_types=1);

namespace App\Models\User;

use CommerceGuys\Enum\AbstractEnum;

/**
 * Class Country.
 */
final class Country extends AbstractEnum
{
    public const RU = 'ru';
    public const UA = 'ua';
    public const US = 'us';
    public const CN = 'cn';
    public const UNKNOWN = 'unknown';
}
