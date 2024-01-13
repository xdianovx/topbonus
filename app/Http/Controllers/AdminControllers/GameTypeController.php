<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\GameType\StoreRequest;
use App\Http\Requests\AdminControllers\GameType\UpdateRequest;
use App\Models\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameTypeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $game_types = GameType::orderBy('id', 'DESC')->paginate(10);
        return view('admin.game_types.index', compact('game_types','user'));
    }

    public function show($game_type_slug)
    {
        $user = Auth::user();
        $item = GameType::whereSlug($game_type_slug)->firstOrFail();
        return view('admin.game_types.show', compact('item','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.game_types.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        
        $data = $request->validated();
       
          // Если есть файл
          if ($request->hasFile('icon')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Расширение
            $extention = $request->file('icon')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "icon/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $data['icon'] = $request->file('icon')->storeAs('public', $fileNameToStore);
        }
        GameType::firstOrCreate($data);
        return redirect()->route('admin.game_types.index')->with('status', 'item-created');
    }
    public function edit($game_type_slug)
    {
        $user = Auth::user();
        $item = GameType::whereSlug($game_type_slug)->firstOrFail();
        return view('admin.game_types.edit', compact('user','item'));
    }
    public function update(UpdateRequest $request, $game_type_slug)
    {
        $game_type = GameType::whereSlug($game_type_slug)->firstOrFail();
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Расширение
            $extention = $request->file('icon')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "icon/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $data['icon'] = $request->file('icon')->storeAs('public', $fileNameToStore);
        }
        $game_type->update($data);
        return redirect()->route('admin.game_types.index')->with('status', 'item-updated');
    }
    
    public function destroy($game_type_slug)
    {

        $game_type = GameType::whereSlug($game_type_slug)->firstOrFail();
        $game_type->delete();
        return redirect()->route('admin.game_types.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $game_types = GameType::orderBy('id', 'DESC')->paginate(10);
        else :
            $game_types = GameType::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.game_types.index', compact('game_types','user'));
    }
}
