<?php

namespace App\Repositories;

use App\Models\Like;
use App\Models\Thing;
use App\Models\bookApp;
use App\Repositories\Contracts\LikeRepository as LikeRepositoryContract;

/**
 * Class LikeRepository
 * @package App\Repositories
 */
class LikeRepository implements LikeRepositoryContract
{
    public function store(bookApp $bookApp, string $ip): Like
    {
        return Like::firstOrCreate([
            'thing_id' => $bookApp->id,
            'ip' => $ip,
        ]);
    }

    public function destroy(bookApp $bookApp, string $ip)
    {
        Like::where('book_app_id', '=', $bookApp->id)
            ->where('ip', '=', $ip)
            ->delete();
    }
}
