<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'age_min', 'age_max', 'city', 'goal', 'goal_text', 'join_additional', 'contacts',
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
        return (bool) $this->users
            ->where('id', $id)
            ->count();
    }

    public function getLinksAttribute()
    {
        if (is_null($contacts = $this->attributes['contacts'])) {
            return null;
        }

        return json_decode($contacts)->contacts;
    }

    public function getSocialsAttribute()
    {
        if (is_null($contacts = $this->attributes['contacts'])) {
            return null;
        }

        return json_decode($contacts)->socials;
    }

    public function getCommanderAttribute()
    {
        return $this->getUsersWhereRole('commander')->first();
    }

    public function getUsersWhereRole(string $role, string $status = 'accepted')
    {
        return $this->users
            ->where('pivot.role', $role)
            ->where('pivot.status', $status);
    }
}
