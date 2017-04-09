<?php

namespace App\Models;

use App\Models\User\GravatarSupportable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\GetsUrlSocialNetworks;
use Laravel\Scout\Searchable;
use Service\ImageUploader\Resolvers\GravatarSupports;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property bool $avatar_rendered
 * @property int $age
 * @property string $sex
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $country
 * @property string $city
 * @property string $about
 * @property string $skype
 * @property string $telephone
 * @property bool $show_email
 * @property bool $is_confirmed
 * @property string $role
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserSocial[] $socials
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereAbout($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereAge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereAvatarRendered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereMiddleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereShowEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSkype($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereGender($value)
 */
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
