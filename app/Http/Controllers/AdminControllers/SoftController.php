<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Soft\StoreRequest;
use App\Http\Requests\AdminControllers\Soft\UpdateRequest;
use App\Models\Casino;
use App\Models\Soft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoftController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $softs = Soft::orderBy('id', 'DESC')->paginate(10);
        return view('admin.softs.index', compact('softs','user'));
    }

    public function show($soft_slug)
    {
        $user = Auth::user();
        $item = Soft::whereSlug($soft_slug)->firstOrFail();
        return view('admin.softs.show', compact('item','user'));
    }

    public function create()
    {
        $user = Auth::user();
        $casinos = Casino::all();
        return view('admin.softs.create', compact('user','casinos'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
          // Если есть файл
          if ($request->hasFile('image')) {
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
            $data['image'] = $request->file('image')->storeAs('public', $fileNameToStore);
        }
        Soft::firstOrCreate($data);
        return redirect()->route('admin.softs.index')->with('status', 'item-created');
    }
    public function edit($soft_slug)
    {
        $user = Auth::user();
        $item = Soft::whereSlug($soft_slug)->firstOrFail();
        $casinos = Casino::all();
        return view('admin.softs.edit', compact('user','item','casinos'));
    }
    public function update(UpdateRequest $request, $soft_slug)
    {
        $soft = Soft::whereSlug($soft_slug)->firstOrFail();
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            // Расширение
            $extention = $request->file('logo')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "logo/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $data['logo'] = $request->file('logo')->storeAs('public', $fileNameToStore);
        }
        $soft->update($data);
        return redirect()->route('admin.softs.index')->with('status', 'item-updated');
    }
    
    public function destroy($soft_slug)
    {

        $soft = Soft::whereSlug($soft_slug)->firstOrFail();
        $soft->delete();
        return redirect()->route('admin.softs.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $softs = Soft::orderBy('id', 'DESC')->paginate(10);
        else :
            $softs = Soft::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.softs.index', compact('softs','user'));
    }
}
