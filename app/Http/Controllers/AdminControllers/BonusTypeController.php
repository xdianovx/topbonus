<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\BonusType\StoreRequest;
use App\Http\Requests\AdminControllers\BonusType\UpdateRequest;
use App\Models\BonusType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusTypeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bonus_types = BonusType::orderBy('id', 'DESC')->paginate(10);
        return view('admin.bonus_types.index', compact('bonus_types','user'));
    }

    public function show($bonus_type_slug)
    {
        $user = Auth::user();
        $item = BonusType::whereSlug($bonus_type_slug)->firstOrFail();
        return view('admin.bonus_types.show', compact('item','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.bonus_types.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        BonusType::firstOrCreate($data);
        return redirect()->route('admin.bonus_types.index')->with('status', 'item-created');
    }
    public function edit($bonus_type_slug)
    {
        $user = Auth::user();
        $item = BonusType::whereSlug($bonus_type_slug)->firstOrFail();
        return view('admin.bonus_types.edit', compact('user','item'));
    }
    public function update(UpdateRequest $request, $bonus_type_slug)
    {
        $bonus_type = BonusType::whereSlug($bonus_type_slug)->firstOrFail();
        $data = $request->validated();
        $bonus_type->update($data);
        return redirect()->route('admin.bonus_types.index')->with('status', 'item-updated');
    }
    
    public function destroy($bonus_type_slug)
    {

        $bonus_type = BonusType::whereSlug($bonus_type_slug)->firstOrFail();
        $bonus_type->delete();
        return redirect()->route('admin.bonus_types.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $bonus_types = BonusType::orderBy('id', 'DESC')->paginate(10);
        else :
            $bonus_types = BonusType::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.bonus_types.index', compact('bonus_types','user'));
    }
}
