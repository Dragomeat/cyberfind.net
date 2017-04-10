<?php

declare(strict_types=1);

namespace App\Models\Team;

use CommerceGuys\Enum\AbstractEnum;

/**
 * Class Map
 * @package App\Models\Team
 */
final class Map extends AbstractEnum
{
    public const MIRAGE = 'mirage';
    public const NUKE = 'nuke';
    public const TRAIN = 'train';
    public const DUST2 = 'dust2';
    public const COBBLE = 'cobble';
    public const OVERPASS = 'overpass';
    public const CACHE = 'cache';
    public const INFERNO = 'inferno';
}
