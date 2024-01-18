<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Game\StoreRequest;
use App\Http\Requests\AdminControllers\Game\UpdateRequest;
use App\Models\Game;
use App\Models\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $games = Game::orderBy('id', 'DESC')->paginate(10);
        return view('admin.games.index', compact('games','user'));
    }

    public function show($game_slug)
    {
        $user = Auth::user();
        $item = Game::whereSlug($game_slug)->firstOrFail();
        return view('admin.games.show', compact('item','user'));
    }

    public function create()
    {
        $game_types = GameType::all();
        $user = Auth::user();
        return view('admin.games.create', compact('user','game_types'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
            endif;  
        Game::firstOrCreate($data);
        
        return redirect()->route('admin.games.index')->with('status', 'item-created');
    }
    public function edit($game_slug)
    {
        $game_types = GameType::all();
        $user = Auth::user();
        $item = Game::whereSlug($game_slug)->firstOrFail();
        return view('admin.games.edit', compact('user','item','game_types'));
    }
    public function update(UpdateRequest $request, $game_slug)
    {
        $game = Game::whereSlug($game_slug)->firstOrFail();

        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
            endif; 

        $game->update($data);

        return redirect()->route('admin.games.index')->with('status', 'item-updated');
    }
    
    public function destroy($game_slug)
    {

        $game = Game::whereSlug($game_slug)->firstOrFail();
        $game->delete();
        return redirect()->route('admin.games.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $games = Game::orderBy('id', 'DESC')->paginate(10);
        else :
            $games = Game::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.games.index', compact('games','user'));
    }
    protected function loadFile(Request $request,$data)
    {
        // Имя и расширение файла
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        // Только оригинальное имя файла
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = str_replace(' ', '_', $filename);
        // Расширение
        $extention = $request->file('image')->getClientOriginalExtension();
        // Путь для сохранения
        $fileNameToStore = "image/" . $filename . "_" . time() . "." . $extention;
        // Сохраняем файл
        $data = $request->file('image')->storeAs('public', $fileNameToStore);
        return $data;
    }
}
