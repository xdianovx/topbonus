<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Country\StoreRequest;
use App\Http\Requests\AdminControllers\Country\UpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // public function index()
    // {
    
    //     $countries = Country::orderBy('id', 'DESC')->paginate(10);
    //     return response()->json($countries);
    // }

    // public function show(Country $country)
    // {
    //         return response()->json($country);
    // }

    // public function store(StoreRequest $request)
    // {
    //     $data = $request->validated();
    //     $country = Country::firstOrCreate($data);
    //     return response()->json($country);
    // }

    // public function update(UpdateRequest $request, Country $country)
    // {
    //     $data = $request->validated();
    //         $country->update($data);
    //         return response()->json([
    //             'message' => 'country updated',
    //             'data' => $country
    //         ], 200);
    // }
    
    // public function destroy(Country $country)
    // {
    //         $country->delete();
    //         return response()->json([
    //             'message' => 'country deleted',
    //         ], 200);
       
    // }

    // public function search(Request $request)
    // {
    //     if (request('search') == null) :
    //         $countries = Country::orderBy('id', 'DESC')->paginate(10);
    //     else :
    //         $countries = Country::where('title', 'ilike', '%' . request('search') . '%')->orWhere('id', 'ilike', '%' . request('search') . '%')->paginate(10);
    //     endif;
    //     return response()->json([
    //         'countries' => $countries
    //     ]);
    // }
}
