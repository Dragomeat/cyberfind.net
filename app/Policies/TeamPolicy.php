<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin() && $ability !== 'join') {
            return true;
        }
    }

    public function join(User $user, Team $team)
    {
        return !$team->checkJoinUser($user->id);
    }

    public function update(User $user, Team $team)
    {
        return $user->id === $team->commander->id;
    }

    public function delete(User $user, Team $team)
    {
        return $user->id === $team->commander->id;
    }
}
