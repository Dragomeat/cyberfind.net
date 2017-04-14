<?php

declare(strict_types=1);

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\GetsUrlSocialNetworks;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use Notifiable, Searchable, GetsUrlSocialNetworks;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'avatar', 'avatar_rendered', 'age',
        'gender', 'first_name', 'last_name', 'middle_name', 'country', 'city',
        'about', 'skype', 'telephone', 'show_email', 'role', 'is_confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socials(): HasMany
    {
        return $this->hasMany(UserSocial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return bool
     */
    public function hasAvatar(): bool
    {
        if (isset($this->original['avatar'], $this->original['avatar_rendered']) &&
            $this->original['avatar'] !== null &&
            $this->original['avatar_rendered']
        ) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return in_array($this->original['role'], ['administrator', 'chief'], true);
    }

    /**
     * @param string $provider
     * @return UserSocial|null
     */
    public function getSocialNetworkByProvider(string $provider): ?UserSocial
    {
        return $this->socials
            ->where('provider', $provider)
            ->first();
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @return string
     */
    public function getAvatarFieldName(): string
    {
        return 'avatar';
    }

    public function getAvatarRenderedFieldName(): string
    {
        return 'avatar_rendered';
    }
}
