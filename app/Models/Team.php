<?php

declare(strict_types=1);

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Team.
 */
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

    /**
     * @return string
     */
    public function searchableAs(): string
    {
        return 'title';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maps(): HasMany
    {
        return $this->hasMany(Map::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(Tournament::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'material');
    }

    /**
     * @param $id
     * @return bool
     */
    public function checkJoinUser($id): bool
    {
        return (bool) $this->findUserWhereStatus($id);
    }

    /**
     * @return array|null
     */
    public function getLinksAttribute()
    {
        if (null === $contacts = $this->attributes['contacts']) {
            return null;
        }

        return json_decode($contacts)->contacts;
    }

    /**
     * @return array|null
     */
    public function getSocialsAttribute()
    {
        if (null === $contacts = $this->attributes['contacts']) {
            return null;
        }

        return json_decode($contacts)->socials;
    }

    /**
     * @return User
     */
    public function getCommanderAttribute()
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
