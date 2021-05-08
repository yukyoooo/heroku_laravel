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
    public function store(bookApp $id, string $ip): Like
    {
        return Like::firstOrCreate([
            'book_app_id' => $id,
            'ip' => $ip,
        ]);
    }

    public function destroy(bookApp $id, string $ip)
    {
        Like::where('book_app_id', '=', $id)
            ->where('ip', '=', $ip)
            ->delete();
    }
}
