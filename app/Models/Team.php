<?php

declare(strict_types=1);

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Team extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'age_min',
        'age_max',
        'city',
        'goal',
        'goal_text',
        'join_additional',
        'contacts',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'holding_at',
        'created_at',
        'updated_at',
    ];

    public function searchableAs()
    {
        return 'title';
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['role', 'status']);
    }

    /**
     * @return Collection
     */
    public function getPendingUsers(): Collection
    {
        return $this->getUsersWhereStatus(['pending']);
    }

    /**
     * @param int $id
     * @param array $status
     * @return User|null
     */
    public function findUserWhereStatus(int $id, array $status = ['accepted']): ?User
    {
        return $this->getUsersWhereStatus($status)
            ->where('id', $id)
            ->first();
    }

    public function maps()
    {
        return $this->hasMany(Map::class);
    }

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }

    public function checkJoinUser($id)
    {
        return (bool) $this->findUserWhereStatus($id);
    }

    public function getLinksAttribute()
    {
        if (null === $contacts = $this->attributes['contacts']) {
            return null;
        }

        return json_decode($contacts)->contacts;
    }

    public function getSocialsAttribute()
    {
        if (null === $contacts = $this->attributes['contacts']) {
            return null;
        }

        return json_decode($contacts)->socials;
    }

    public function getCommanderAttribute(): User
    {
        return $this->getUsersWhereRole('commander')->first();
    }

    /**
     * @param string $role
     * @param array $status
     * @return Collection
     */
    public function getUsersWhereRole(string $role, array $status = ['accepted']): Collection
    {
        return $this->getUsersWhereStatus($status)
            ->where('pivot.role', $role);
    }

    /**
     * @param array $status
     * @return Collection
     */
    public function getUsersWhereStatus(array $status = ['accepted']): Collection
    {
        return $this->users
            ->whereInStrict('pivot.status', $status);
    }
}
