<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\BonusCard\StoreRequest;
use App\Http\Requests\AdminControllers\BonusCard\UpdateRequest;
use App\Models\BonusCard;
use App\Models\BonusType;
use App\Models\bonus;
use App\Models\Casino;
use App\Models\Category;
use App\Models\Country;
use App\Models\Game;
use App\Models\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BonusCardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bonus_cards = BonusCard::orderBy('id', 'DESC')->paginate(10);
        return view('admin.bonus.index', compact('bonus_cards', 'user'));
    }

    public function show($bonus_slug)
    {
        $user = Auth::user();
        $item = BonusCard::whereSlug($bonus_slug)->firstOrFail();
        return view('admin.bonus.show', compact('item', 'user'));
    }

    public function create()
    {
        $bonus_types = BonusType::all();
        $casinos = Casino::all();
        $categories = Category::all();
        $game_types = GameType::all();
        $countries = Country::all();
        $user = Auth::user();
        return view('admin.bonus.create', compact(
            'user',
            'bonus_types',
            'casinos',
            'categories',
            'game_types',
            'countries'
        ));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $split_data = $this->cutArraysFromRequest($data);
        
        $data = $split_data['data'];

        $data = $this->changeTitleToId($data);

        $bonus = BonusCard::firstOrCreate($data);

        $this->writeDataToTable($bonus,$split_data['game_typesIds'],$split_data['countriesIds']);
        
     
        return redirect()->route('admin.bonus_cards.index')->with('status', 'item-created');
    }
    public function edit($bonus_slug)
    {
        $item = BonusCard::whereSlug($bonus_slug)->firstOrFail();
        $bonus_types = BonusType::all();
        $casinos = Casino::all();
        $categories = Category::all();

        $game_types = $item->casino->game_types;
        $countries = $item->casino->countries;

        $user = Auth::user();
        
        return view('admin.bonus.edit', compact(
            'user',
            'item',
            'bonus_types',
            'casinos',
            'categories',
            'game_types',
            'countries'
        ));
    }
    public function update(UpdateRequest $request, $bonus_slug)
    {
        $bonus = BonusCard::whereSlug($bonus_slug)->firstOrFail();
        $data = $request->validated();
 
        $split_data = $this->cutArraysFromRequest($data);
        
        $data = $split_data['data'];

        $data = $this->changeTitleToId($data);

        $bonus->update($data);

        $this->writeDataToTable($bonus,$split_data['game_typesIds'],$split_data['countriesIds']);

        return redirect()->route('admin.bonus_cards.index')->with('status', 'item-updated');
    }

    public function destroy($bonus_slug)
    {

        $bonus = BonusCard::whereSlug($bonus_slug)->firstOrFail();
        $bonus->delete();
        return redirect()->route('admin.bonus_cards.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $bonuses = BonusCard::orderBy('id', 'DESC')->paginate(10);
        else :
            $bonuses = BonusCard::where('title', 'ilike', '%' . request('search') . '%')
                ->orWhere('slug', 'ilike', '%' . request('search') . '%')
                ->orWhere('id', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.bonus.index', compact('bonuses', 'user'));
    }

    protected function cutArraysFromRequest($data)
    {
        if (isset($data['game_types'])) :
            $game_typesIds = $data['game_types'];
            unset($data['game_types']);
        endif;
        if (isset($data['countries'])) :
            $countriesIds = $data['countries'];
            unset($data['countries']);
        endif;
        return [
            'data'=> $data,
            'game_typesIds'=> $game_typesIds,
            'countriesIds' => $countriesIds
        ];
    }
    protected function changeTitleToId($data)
    {
        if (isset($data['bonus_type_id'])) :  
            $data['bonus_type_id'] = BonusType::where('title',$data['bonus_type_id'])->first()->id;
         endif;
         if (isset($data['casino_id'])) :  
            $data['casino_id'] = Casino::where('title',$data['casino_id'])->first()->id;
         endif;
         if (isset($data['category_id'])) :  
            $data['category_id'] = Category::where('title',$data['category_id'])->first()->id;
         endif;
         return $data;
    }

    protected function writeDataToTable($item,$game_typesIds,$countriesIds)
    {
        if (isset($game_typesIds)) :
            foreach ($game_typesIds as $key => $value) :
                $game_types_id = DB::table('game_types')
                    ->where('title', $value)
                    ->first()->id;
                $game_typesIds[$key] = $game_types_id;
            endforeach;
            $item->game_types()->sync($game_typesIds);
        endif;
        if (isset($countriesIds)) :
            foreach ($countriesIds as $key => $value) :
                $countries_id = DB::table('countries')
                    ->where('title', $value)
                    ->first()->id;
                $countriesIds[$key] = $countries_id;
            endforeach;
            $item->countries()->sync($countriesIds);
        endif;
    }
}
