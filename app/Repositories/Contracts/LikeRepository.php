<?php

namespace App\Repositories\Contracts;

use App\Models\Like;
use App\Models\Thing;
use App\Models\bookApp;

interface LikeRepository
{
    public function store(bookApp $id, string $ip): Like;

    public function destroy(bookApp $id, string $ip);
}
