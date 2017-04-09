<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 23:08.
 */

namespace App\Models\User;

use CommerceGuys\Enum\AbstractEnum;

final class Country extends AbstractEnum
{
    public const RU = 'ru';
    public const UA = 'ua';
    public const US = 'us';
    public const CN = 'cn';
    public const UNKNOWN = 'unknown';
}
