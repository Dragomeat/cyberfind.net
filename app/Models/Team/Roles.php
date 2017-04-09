<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 23:08.
 */

namespace App\Models\Team;

use CommerceGuys\Enum\AbstractEnum;

final class Roles extends AbstractEnum
{
    public const COMMANDER = 'commander';
    public const BASIC_TEAM = 'main_part';
    public const ADDITIONAL_TEAM = 'additional_part';
    public const MANAGER = 'manager';
}
