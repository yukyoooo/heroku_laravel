<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Models\bookApp;
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

    public function store(bookApp $bookApp, Request $request)
    {
        $this->likes->store($bookApp, $request->ip());

        return redirect()->route('bookapp.slide.index');
    }

    public function destroy(bookApp $bookApp, Request $request)
    {
        $this->likes->destroy($bookApp, $request->ip());

        return redirect()->route('bookapp.slide.index');
    }
}
