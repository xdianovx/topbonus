<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Game\StoreRequest;
use App\Http\Requests\AdminControllers\Game\UpdateRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
    
        $games = Game::orderBy('id', 'DESC')->paginate(10);
        return response()->json($games);
    }

    public function show(Game $game)
    {
            return response()->json($game);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $game = Game::firstOrCreate($data);
        return response()->json($game);
    }

    public function update(UpdateRequest $request, Game $game)
    {
        $data = $request->validated();
            $game->update($data);
            return response()->json([
                'message' => 'game updated',
                'data' => $game
            ], 200);
    }
    
    public function destroy(Game $game)
    {
            $game->delete();
            return response()->json([
                'message' => 'game deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $games = Game::orderBy('id', 'DESC')->paginate(10);
        else :
            $games = Game::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'games' => $games
        ]);
    }
}
