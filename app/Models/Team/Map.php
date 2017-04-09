<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 23:08.
 */

namespace App\Models\Team;

use CommerceGuys\Enum\AbstractEnum;

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
