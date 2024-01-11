<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Casino\StoreRequest;
use App\Http\Requests\AdminControllers\Casino\UpdateRequest;
use App\Models\Casino;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasinoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $casinos = Casino::orderBy('id', 'DESC')->paginate(10);
        return view('admin.casino.index', compact('user','casinos'));
    }

    public function show(Casino $casino)
    {
            return response()->json($casino);
    }
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('admin.casino.create', compact('user','categories'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $casino = Casino::firstOrCreate($data);
        return response()->json($casino);
    }
    public function edit(Casino $casino)
    {
        $user = Auth::user();
        return view('admin.bonus.edit', compact('user','casino'));
    }
    public function update(UpdateRequest $request, Casino $casino)
    {
        $data = $request->validated();
            $casino->update($data);
            return response()->json([
                'message' => 'casino updated',
                'data' => $casino
            ], 200);
    }
    
    public function destroy(Casino $casino)
    {
            $casino->delete();
            return response()->json([
                'message' => 'casino deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $casinos = Casino::orderBy('id', 'DESC')->paginate(10);
        else :
            $casinos = Casino::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'casinos' => $casinos
        ]);
    }
}
