<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Soft\StoreRequest;
use App\Http\Requests\AdminControllers\Soft\UpdateRequest;
use App\Models\Soft;
use Illuminate\Http\Request;

class SoftController extends Controller
{
    public function index()
    {
    
        $softs = Soft::orderBy('id', 'DESC')->paginate(10);
        return response()->json($softs);
    }

    public function show(Soft $soft)
    {
            return response()->json($soft);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $soft = Soft::firstOrCreate($data);
        return response()->json($soft);
    }

    public function update(UpdateRequest $request, Soft $soft)
    {
        $data = $request->validated();
            $soft->update($data);
            return response()->json([
                'message' => 'soft updated',
                'data' => $soft
            ], 200);
    }
    
    public function destroy(Soft $soft)
    {
            $soft->delete();
            return response()->json([
                'message' => 'soft deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $softs = Soft::orderBy('id', 'DESC')->paginate(10);
        else :
            $softs = Soft::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'softs' => $softs
        ]);
    }
}
