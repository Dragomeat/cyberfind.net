<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSocial.
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereProvider($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereProviderUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserSocial whereUserId($value)
 * @mixin \Eloquent
 */
class UserSocial extends Model
{
    protected $fillable = [
        'user_id', 'provider_user_id', 'provider',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
