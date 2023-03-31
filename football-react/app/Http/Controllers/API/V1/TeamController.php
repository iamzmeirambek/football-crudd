<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function PHPUnit\Framework\returnArgument;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $teams = Team::all();
        return view('teams.index', $teams)->with('teams' , $teams);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Team::create($request->all());

        return redirect('team')->with('flash_message', 'Team Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::find($id);
        return view('teams.show')->with('teams', $team);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::find($id);
        return view('teams.edit')->with('teams', $team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::find($id);
        $input = $request->all();
        $team->update($input);
        return redirect('team')->with('flash_message', 'Team Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::destroy($id);
        return redirect('team')->with('flash_message', 'Team deleted!');
    }

    public function showPlayers(Team $team)
    {
        $players = $team->players;

        return view('players.index', compact('team', 'players'));
    }


}
