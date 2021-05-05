<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Repositories\LikeRepository;
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

    public function store(Thing $thing, Request $request)
    {
        $this->likes->store($thing, $request->ip());

        return redirect()->route('thing.index');
    }

    public function destroy(Thing $thing, Request $request)
    {
        $this->likes->destroy($thing, $request->ip());

        return redirect()->route('thing.index');
    }
}
