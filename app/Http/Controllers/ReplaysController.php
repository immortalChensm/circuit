<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplayRequest;

class ReplaysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$replays = Replay::paginate();
		return view('replays.index', compact('replays'));
	}

    public function show(Replay $replay)
    {
        return view('replays.show', compact('replay'));
    }

	public function create(Replay $replay)
	{
		return view('replays.create_and_edit', compact('replay'));
	}

	public function store(ReplayRequest $request)
	{
		$replay = Replay::create($request->all());
		return redirect()->route('replays.show', $replay->id)->with('message', 'Created successfully.');
	}

	public function edit(Replay $replay)
	{
        $this->authorize('update', $replay);
		return view('replays.create_and_edit', compact('replay'));
	}

	public function update(ReplayRequest $request, Replay $replay)
	{
		$this->authorize('update', $replay);
		$replay->update($request->all());

		return redirect()->route('replays.show', $replay->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Replay $replay)
	{
		$this->authorize('destroy', $replay);
		$replay->delete();

		return redirect()->route('replays.index')->with('message', 'Deleted successfully.');
	}
}