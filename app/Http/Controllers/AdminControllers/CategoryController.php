<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Category\StoreRequest;
use App\Http\Requests\AdminControllers\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return response()->json($categories);
    }

    public function show(Category $category)
    {
            return response()->json($category);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::firstOrCreate($data);
        return response()->json($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
            $category->update($data);
            return response()->json([
                'message' => 'category updated',
                'data' => $category
            ], 200);
    }
    
    public function destroy(Category $category)
    {
            $category->delete();
            return response()->json([
                'message' => 'category deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $categories = Category::orderBy('id', 'DESC')->paginate(10);
        else :
            $categories = Category::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'categories' => $categories
        ]);
    }
}
