<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Models\User\GravatarSupportable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\GetsUrlSocialNetworks;
use App\Notifications\ResetPasswordNotification;
use Service\ImageUploader\Resolvers\GravatarSupports;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements GravatarSupports
{
    use Notifiable, Searchable, GravatarSupportable, GetsUrlSocialNetworks;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password',
        'avatar', 'avatar_rendered',
        'age', 'gender', 'first_name', 'last_name', 'middle_name',
        'country', 'city', 'about', 'skype',
        'telephone', 'show_email',
        'role', 'is_confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socials()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * @return bool
     */
    public function hasAvatar(): bool
    {
        if (isset($this->original['avatar'], $this->original['avatar_rendered']) &&
            $this->original['avatar'] !== null &&
            $this->original['avatar_rendered']) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return in_array($this->original['role'], ['administrator', 'chief']);
    }

    public function getSocialNetworkByProvider(string $provider)
    {
        return $this->socials
            ->where('provider', $provider)
            ->first();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
