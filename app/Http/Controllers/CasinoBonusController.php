<?php

namespace App\Http\Controllers;

use App\Models\CasinoBonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CasinoBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CasinoBonus::all();
        return view('admin.casino_bonus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.casino_bonus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ], [
            'title' => 'Поле Title обязательно',
            'link' => 'Поле Link обязательно',

        ]);

        CasinoBonus::create($request->all());

        return redirect()->route('admin.bonus_code.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CasinoBonus $casinoBonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CasinoBonus $casinoBonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CasinoBonus $casinoBonus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CasinoBonus $casinoBonus)
    {
        //
    }
}
