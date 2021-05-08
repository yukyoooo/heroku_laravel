<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Repositories\Contracts\ThingRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * @var \App\Repositories\Contracts\ThingRepository
     */
    public $repository;

    public function __construct(ThingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $things = $this->repository->search($request->query());
        $things->loadCount('likes');
        $things->loadCount(['likes as liked' => function (Builder $query) {
            $query->where('ip', '=', request()->ip());
        }]);
        //$things->load('myLike');

        return view('thing.index', compact('things'));
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('thing.index');
    }

    public function edit(Thing $thing)
    {
        return view('thing.edit', compact('thing'));
    }

    public function update(Thing $thing, Request $request)
    {
        $this->repository->update($thing, $request->all());

        return redirect()->route('thing.index');
    }

    public function destroy(Thing $thing)
    {
        $this->repository->delete($thing);

        return redirect()->route('thing.index');
    }
}
