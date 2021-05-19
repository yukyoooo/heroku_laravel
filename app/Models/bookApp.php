<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class bookapp
 *
 */
class bookApp extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /** [relation] {@see \App\Models\bookApp::$likes} */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // /** [relation] {@see \App\Models\bookApp::$myLike} */
    // public function myLike()
    // {
    //     return $this->hasOne(Like::class)
    //         ->selectRaw('book_app_id, count(*) > 0 as liked')
    //         ->where('ip', '=', request()->ip())
    //         ->groupBy(['book_app_id']);
    // }

    public function liked(): bool
    {
        return $this->likes()->where('ip', '=', request()->ip())->exists();
    }

    public function getLikedAttribute()
    {
        return $this->likes()->where('ip', '=', request()->ip())->exists();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'book_app_tag', 'book_app_id', 'tag_id')->withTimestamps();
    }
}
