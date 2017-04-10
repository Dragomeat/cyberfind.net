<?php

declare(strict_types=1);

namespace App\Models\Team;

use CommerceGuys\Enum\AbstractEnum;

/**
 * Class Roles
 * @package App\Models\Team
 */
final class Roles extends AbstractEnum
{
    public const COMMANDER = 'commander';
    public const BASIC_TEAM = 'main_part';
    public const ADDITIONAL_TEAM = 'additional_part';
    public const MANAGER = 'manager';
}
