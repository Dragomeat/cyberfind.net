<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Tags
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tags whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tags whereName($value)
 * @mixin \Eloquent
 */
	class Tags extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Map
 *
 * @property int $id
 * @property int $team_id
 * @property string $map
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Map whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Map whereMap($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Map whereTeamId($value)
 */
	class Map extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property string $title
 * @property int $age_min
 * @property int $age_max
 * @property string $city
 * @property string $goal
 * @property string $goal_text
 * @property string $join_additional
 * @property int $command_limit
 * @property mixed $contacts
 * @property \Carbon\Carbon $holding_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $commander
 * @property-read mixed $links
 * @property-read mixed $socials
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Map[] $maps
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tournament[] $tournaments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereAgeMax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereAgeMin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereCommandLimit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereContacts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereGoal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereGoalText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereHoldingAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereJoinAdditional($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tournament
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property mixed $map
 * @property int $max_teams
 * @property string $holding_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereHoldingAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereMap($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereMaxTeams($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tournament whereUpdatedAt($value)
 */
	class Tournament extends \Eloquent {}
}

namespace App\Models{
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
	class UserSocial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $illustration
 * @property string $slug
 * @property string $content_source
 * @property string $content_rendered
 * @property string $status
 * @property string $published_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tags[] $tags
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereContentRendered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereContentSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereIllustration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News latest()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News latestPublished()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News published()
 */
	class News extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 */
	class User extends \Eloquent {}
}

