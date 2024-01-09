<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\GameType\StoreRequest;
use App\Http\Requests\AdminControllers\GameType\UpdateRequest;
use App\Models\GameType;
use Illuminate\Http\Request;

class GameTypeController extends Controller
{
    public function index()
    {
    
        $game_types = GameType::orderBy('id', 'DESC')->paginate(10);
        return response()->json($game_types);
    }

    public function show(GameType $game_type)
    {
            return response()->json($game_type);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $game_type = GameType::firstOrCreate($data);
        return response()->json($game_type);
    }

    public function update(UpdateRequest $request, GameType $game_type)
    {
        $data = $request->validated();
            $game_type->update($data);
            return response()->json([
                'message' => 'game_type updated',
                'data' => $game_type
            ], 200);
    }
    
    public function destroy(GameType $game_type)
    {
            $game_type->delete();
            return response()->json([
                'message' => 'game_type deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $game_types = GameType::orderBy('id', 'DESC')->paginate(10);
        else :
            $game_types = GameType::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'game_types' => $game_types
        ]);
    }
}
