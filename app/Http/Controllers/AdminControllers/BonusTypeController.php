<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\BonusType\StoreRequest;
use App\Http\Requests\AdminControllers\BonusType\UpdateRequest;
use App\Models\BonusType;
use Illuminate\Http\Request;

class BonusTypeController extends Controller
{
    public function index()
    {
    
        $bonus_types = BonusType::orderBy('id', 'DESC')->paginate(10);
        return response()->json($bonus_types);
    }

    public function show(BonusType $bonus_type)
    {
            return response()->json($bonus_type);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $bonus_type = BonusType::firstOrCreate($data);
        return response()->json($bonus_type);
    }

    public function update(UpdateRequest $request, BonusType $bonus_type)
    {
        $data = $request->validated();
            $bonus_type->update($data);
            return response()->json([
                'message' => 'bonus_type updated',
                'data' => $bonus_type
            ], 200);
    }
    
    public function destroy(BonusType $bonus_type)
    {
            $bonus_type->delete();
            return response()->json([
                'message' => 'bonus_type deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $bonus_types = BonusType::orderBy('id', 'DESC')->paginate(10);
        else :
            $bonus_types = BonusType::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'bonus_types' => $bonus_types
        ]);
    }
}
