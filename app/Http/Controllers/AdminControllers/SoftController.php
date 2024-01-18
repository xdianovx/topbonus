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
        $data = $this->changeTitleToId($data);

        if ($request->hasFile('logo')):
            $data['logo'] = $this->loadFile($request,$data);
            endif;  
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

        $data = $this->changeTitleToId($data);

        if ($request->hasFile('logo')):
            $data['logo'] = $this->loadFile($request,$data);
            endif;  
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
    protected function changeTitleToId($data)
    {
        if (isset($data['casino_id'])) :
            $casino_id = Casino::where('title',$data['casino_id'])->first()->id;
            array_replace($data, [$data['casino_id'] = $casino_id]);
         endif;
         return $data;
    }
    protected function loadFile(Request $request,$data)
    {
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
        $data = $request->file('logo')->storeAs('public', $fileNameToStore);
        return $data;
    
    }
}
