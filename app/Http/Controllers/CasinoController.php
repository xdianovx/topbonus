<?php

namespace App\Http\Controllers;

use App\Models\Casino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CasinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casinos = Casino::all();
        return view('admin.casino.index', compact('casinos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.casino.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Casino $casino, Request $request)
    {
        $casino = new Casino();

        $path = public_path('images/');
        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move($path, $imageName);
        $casino->logo = $imageName;
        $casino->title = $request->title;
        $casino->save();

        return redirect()->route('admin.casino.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Casino $casino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Casino $casino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Casino $casino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Casino $casino)
    {
        //
    }
}
