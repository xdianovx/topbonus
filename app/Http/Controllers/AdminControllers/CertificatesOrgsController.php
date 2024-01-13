<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\CertificatesOrgs\UpdateRequest;
use App\Http\Requests\AdminControllers\CertificatesOrgs\StoreRequest;
use App\Models\Casino;
use App\Models\CertificatesOrgs;
use App\Models\LicensesOrgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificatesOrgsController extends Controller
{
    
    public function index()
    {

        $user = Auth::user();
        $certificates = CertificatesOrgs::orderBy('id', 'DESC')->paginate(10);
        return view('admin.certificates.index', compact('certificates','user'));
    }

    public function show(CertificatesOrgs $certificat)
    {

        $user = Auth::user();
        $item = CertificatesOrgs::whereId($certificat->id)->firstOrFail();
        return view('admin.certificates.show', compact('item','user'));
    }

    public function create()
    {

        $user = Auth::user();
        $casinos = Casino::all();
        return view('admin.certificates.create', compact('user','casinos'));
    }
    public function store(StoreRequest $request)
    {
        
        $data = $request->validated();
        // dd($data);
          // Если есть файл
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
        CertificatesOrgs::firstOrCreate($data);
        return redirect()->route('admin.certificates.index')->with('status', 'item-created');
    }
    public function edit(CertificatesOrgs $certificat)
    {

        $user = Auth::user();
        $item = CertificatesOrgs::whereId($certificat->id)->firstOrFail();
        $casinos = Casino::all();
        return view('admin.certificates.edit', compact('user','item','casinos'));
    }
    public function update(UpdateRequest $request, CertificatesOrgs $certificat)
    {
        $item = CertificatesOrgs::whereId($certificat->id)->firstOrFail();
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
        $certificat->update($data);
        return redirect()->route('admin.certificates.index')->with('status', 'item-updated');
    }
    
    public function destroy(CertificatesOrgs$certificat)
    {

        $item = CertificatesOrgs::whereId($certificat->id)->firstOrFail();
        $certificat->delete();
        return redirect()->route('admin.certificates.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {

        $user = Auth::user();
        if (request('search') == null) :
            $certificates = CertificatesOrgs::orderBy('id', 'DESC')->paginate(10);
        else :
            $certificates = CertificatesOrgs::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.certificates.index', compact('certificates','user'));
    }
}
