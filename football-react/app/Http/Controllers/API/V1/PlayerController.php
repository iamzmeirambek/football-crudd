<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\TeamController;

use App\Models\Player;
use App\Models\Team;
use App\Models\transfer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $team_id = $request->input('team_id');
        $players = Player::where('team_id', $team_id)->get();
        return view('players.index')->with('players' , $players);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['team_id'] = stristr( $request->team_id, ' ', true);
        Player::create($request->all());
        return redirect('team/players/'.$request->team_id)->with('flash_message', 'Player Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::find($id);
        return view('players.show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::find($id);
        return view('players.edit')->with('players', $player);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player = Player::find($id);
        $request['team_id'] = stristr( $request->team_id, ' ', true);
        if ($request['team_id'] != $player['team_id']){
                $this->storeTransfer($request,$player['team_id']);
        }
        $input = $request->all();
        $player->update($input);
        return redirect('team/players/'.$player->team_id)->with('flash_message', 'Player Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::find($id);
        Player::destroy($id);
        return redirect('team/players/'.$player->team_id)->with('flash_message', 'Player deleted!');
    }

    public function storeTransfer(Request $request, $id)
    {
        $transfer = [
            'player_id' => $request->input('id'),
            'team_from_id' => $id,
            'team_to_id' => $request->input('team_id'),
            'cost' => $request->input('cost')
        ];

        Transfer::create($transfer);
    }
}
