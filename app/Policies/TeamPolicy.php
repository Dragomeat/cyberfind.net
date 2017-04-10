<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    private $exceptAbilities = ['join', 'leave', 'manage'];

    /**
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if (
            !in_array($ability, $this->exceptAbilities, true)
            && $user->isAdmin()
        ) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Team $team
     * @return bool
     */
    public function join(User $user, Team $team)
    {
        if ($team->findUserWhereStatus($user->id, ['pending', 'rejected'])) {
            return false;
        }

        return !$team->checkJoinUser($user->id);
    }

    /**
     * @param User $user
     * @param Team $team
     * @return bool
     */
    public function leave(User $user, Team $team)
    {
        return (bool) $team->findUserWhereStatus($user->id, ['accepted', 'pending']);
    }

    /**
     * @param User $user
     * @param Team $team
     * @return bool
     */
    public function update(User $user, Team $team)
    {
        return $team->commander->id === $user->id;
    }

    /**
     * @param User $user
     * @param Team $team
     * @return bool
     */
    public function delete(User $user, Team $team)
    {
        return $user->id === $team->commander->id;
    }

    /**
     * @param User $user
     * @param Team $team
     * @return bool
     */
    public function manage(User $user, Team $team)
    {
        return $team->commander->id === $user->id;
    }
}
