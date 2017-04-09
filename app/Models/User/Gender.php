<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 23:08.
 */

namespace App\Models\User;

use CommerceGuys\Enum\AbstractEnum;

final class Gender extends AbstractEnum
{
    public const MALE = 'male';
    public const FEMALE = 'female';
    public const UNKNOWN = 'unknown';
}
