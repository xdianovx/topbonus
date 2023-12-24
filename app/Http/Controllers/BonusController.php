<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Casino;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bonuses = Bonus::all();
        return view('admin.bonus.index', compact('bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $casinos = Casino::all();
        return view('admin.bonus.create', compact('casinos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bonus::create($request->all());
        return redirect()->route('admin.bonus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bonus $bonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bonus $bonus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bonus $bonus)
    {
        //
    }
}
