<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\BonusCard\StoreRequest;
use App\Http\Requests\AdminControllers\BonusCard\UpdateRequest;
use App\Models\BonusCard;
use App\Models\BonusType;
use App\Models\Casino;
use App\Models\Country;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusCardController extends Controller
{
    public function index()
    {
    
        $bonus_cards = BonusCard::orderBy('id', 'DESC')->paginate(10);
        $user = Auth::user();
        return view('admin.bonus.index', compact('bonus_cards','user'));
    }

    public function show(BonusCard $bonus_card)
    {
            return response()->json($bonus_card);
    }
    public function create()
    {
        $casinos = Casino::all();
        $countries = Country::all();
        $bonus_types = BonusType::all();
        $games = Game::all();
        $user = Auth::user();
        return view('admin.bonus.create', compact('user','casinos','countries','bonus_types','games'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $bonus_card = BonusCard::firstOrCreate($data);
        return view('admin.bonus.index', compact('bonus_card'))->with('status', 'bonus-created');
    }

    public function update(UpdateRequest $request, BonusCard $bonus_card)
    {
        $data = $request->validated();
            $bonus_card->update($data);
            return response()->json([
                'message' => 'bonus_card updated',
                'data' => $bonus_card
            ], 200);
    }
    
    public function destroy(BonusCard $bonus_card)
    {
            $bonus_card->delete();
            return response()->json([
                'message' => 'bonus_card deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $bonus_cards = BonusCard::orderBy('id', 'DESC')->paginate(10);
        else :
            $bonus_cards = BonusCard::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'bonus_cards' => $bonus_cards
        ]);
    }
}
