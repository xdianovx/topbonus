<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Casino\StoreRequest;
use App\Http\Requests\AdminControllers\Casino\UpdateRequest;
use App\Models\Casino;
use App\Models\Category;
use App\Models\CertificatesOrgs;
use App\Models\Country;
use App\Models\GameType;
use App\Models\LicensesOrgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CasinoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $casinos = Casino::orderBy('id', 'DESC')->paginate(10);
        return view('admin.casino.index', compact('casinos', 'user'));
    }

    public function show($casino_slug)
    {
        $user = Auth::user();
        $item = Casino::whereSlug($casino_slug)->firstOrFail();
        return view('admin.casino.show', compact('item', 'user'));
    }

    public function create()
    {
        $certificates = CertificatesOrgs::all();
        $licenses = LicensesOrgs::all();
        $game_types = GameType::all();
        $countries = Country::all();
        $user = Auth::user();
        return view('admin.casino.create', compact(
            'user',
            'certificates',
            'licenses',
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
        if ($request->hasFile('logo')) :
            $data['logo'] = $this->loadFile($request, $data);
        endif;

        $casino = Casino::firstOrCreate($data);

        $this->writeDataToTable($casino, $split_data['game_typesIds'], $split_data['countriesIds']);

        return redirect()->route('admin.casinos.index')->with('status', 'item-created');
    }
    public function edit($casino_slug)
    {
        $certificates = CertificatesOrgs::all();
        $licenses = LicensesOrgs::all();
        $game_types = GameType::all();
        $countries = Country::all();
        $user = Auth::user();
        $item = Casino::whereSlug($casino_slug)->firstOrFail();
        return view('admin.casino.edit', compact(
            'user',
            'item',
            'certificates',
            'licenses',
            'game_types',
            'countries'
        ));
    }
    public function update(UpdateRequest $request, $casino_slug)
    {
        $casino = Casino::whereSlug($casino_slug)->firstOrFail();
        $data = $request->validated();

        $split_data = $this->cutArraysFromRequest($data);
        $data = $split_data['data'];
        $data = $this->changeTitleToId($data);
        if ($request->hasFile('logo')) :
            $data['logo'] = $this->loadFile($request, $data);
        endif;
        $casino->update($data);

        $this->writeDataToTable($casino, $split_data['game_typesIds'], $split_data['countriesIds']);

        return redirect()->route('admin.casinos.index')->with('status', 'item-updated');
    }

    public function destroy($casino_slug)
    {

        $casino = Casino::whereSlug($casino_slug)->firstOrFail();
        $casino->delete();
        return redirect()->route('admin.casinos.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $casinos = Casino::orderBy('id', 'DESC')->paginate(10);
        else :
            $casinos = Casino::where('title', 'ilike', '%' . request('search') . '%')
                ->orWhere('slug', 'ilike', '%' . request('search') . '%')
                ->orWhere('id', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.casino.index', compact('casinos', 'user'));
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
            'data' => $data,
            'game_typesIds' => $game_typesIds,
            'countriesIds' => $countriesIds
        ];
    }
    protected function changeTitleToId($data)
    {
        if (isset($data['certificate_id'])) :
            $data['certificate_id'] = CertificatesOrgs::where('title', $data['certificate_id'])->first()->id;
        endif;
        if (isset($data['license_id'])) :
            $data['license_id'] = LicensesOrgs::where('title', $data['license_id'])->first()->id;
        endif;
        return $data;
    }
    protected function loadFile(Request $request, $data)
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
    protected function writeDataToTable($item, $game_typesIds, $countriesIds)
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
