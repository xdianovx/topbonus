<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\LicensesOrgs\StoreRequest;
use App\Http\Requests\AdminControllers\LicensesOrgs\UpdateRequest;
use App\Models\Casino;
use App\Models\CertificatesOrgs;
use App\Models\LicensesOrgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicensesOrgsController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $licenses = LicensesOrgs::orderBy('id', 'DESC')->paginate(10);
        return view('admin.licenses.index', compact('licenses','user'));
    }

    public function show(LicensesOrgs $licens)
    {

        $user = Auth::user();
        $item = LicensesOrgs::whereId($licens->id)->firstOrFail();
        return view('admin.licenses.show', compact('item','user'));
    }

    public function create()
    {

        $user = Auth::user();
        return view('admin.licenses.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        
        $data = $request->validated();

        if ($request->hasFile('logo')):
            $data['logo'] = $this->loadFile($request,$data);
            endif;  

        LicensesOrgs::firstOrCreate($data);
        
        return redirect()->route('admin.licenses.index')->with('status', 'item-created');
    }
    public function edit(LicensesOrgs $licens)
    {

        $user = Auth::user();
        $item = LicensesOrgs::whereId($licens->id)->firstOrFail();
        return view('admin.licenses.edit', compact('user','item'));
    }
    public function update(UpdateRequest $request, LicensesOrgs $licens)
    {
        $item = LicensesOrgs::whereId($licens->id)->firstOrFail();

        $data = $request->validated();
       
        if ($request->hasFile('logo')):
            $data['logo'] = $this->loadFile($request,$data);
            endif;  

        $licens->update($data);

        return redirect()->route('admin.licenses.index')->with('status', 'item-updated');
    }
    
    public function destroy(LicensesOrgs $licens)
    {

        $item = LicensesOrgs::whereId($licens->id)->firstOrFail();
        $licens->delete();
        return redirect()->route('admin.licenses.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {

        $user = Auth::user();
        if (request('search') == null) :
            $licenses = LicensesOrgs::orderBy('id', 'DESC')->paginate(10);
        else :
            $licenses = LicensesOrgs::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.licenses.index', compact('licenses','user'));
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
