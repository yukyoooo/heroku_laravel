<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Models\Like;
use App\Models\bookApp;
use App\Repositories\Contracts\LikeRepository;
use Illuminate\Http\Request;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * @var \App\Repositories\Contracts\LikeRepository
     */
    private $likes;

    public function __construct(LikeRepository $likes)
    {
        $this->likes = $likes;
    }

    public function store(bookApp $id, Request $request)
    {
        $like = Like::firstOrCreate([
            'book_app_id' => $id->id,
            'ip' => $request->ip(),
        ]);
        return redirect()->route('bookapp.slide.index');
    }

    public function destroy(bookApp $id, Request $request)
    {
        Like::where('book_app_id', '=', $id->id)
            ->where('ip', '=', $request->ip())
            ->delete();

        return redirect()->route('bookapp.slide.index');
    }
}
