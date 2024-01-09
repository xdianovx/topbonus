<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Casino;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function index(Request $request)
    {
        $casinos = Casino::paginate(5);

        $query = $request->get('query');
        if ($request->ajax()) {
            $casino = Casino::where('title', 'LIKE', '%' . $request->search . "%")->get();
            return $casino;
        }

        return view('welcome', compact('casinos'));
    }
}
