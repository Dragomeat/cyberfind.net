<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\News.
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
 */
class News extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function scopeLatestPublished(Builder $builder): Builder
    {
        return $builder->latest('published_at')
            ->published();
    }

    public function scopeLatest(Builder $builder): Builder
    {
        return $builder->orderBy('published_at', 'desc');
    }

    public static function scopePublished(Builder $builder): Builder
    {
        return $builder
            ->where('published_at', '<=', Carbon::now())
            ->where('status', 'published');
    }
}
