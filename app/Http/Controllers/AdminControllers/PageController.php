<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Page\StoreRequest;
use App\Http\Requests\AdminControllers\Page\UpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    
        $pages = Page::orderBy('id', 'DESC')->paginate(10);
        return response()->json($pages);
    }

    public function show(Page $page)
    {
            return response()->json($page);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $page = Page::firstOrCreate($data);
        return response()->json($page);
    }

    public function update(UpdateRequest $request, Page $page)
    {
        $data = $request->validated();
            $page->update($data);
            return response()->json([
                'message' => 'page updated',
                'data' => $page
            ], 200);
    }
    
    public function destroy(Page $page)
    {
            $page->delete();
            return response()->json([
                'message' => 'page deleted',
            ], 200);
       
    }

    public function search(Request $request)
    {
        if (request('search') == null) :
            $pages = Page::orderBy('id', 'DESC')->paginate(10);
        else :
            $pages = Page::where('title', 'ilike', '%' . request('search') . '%')->orWhere('slug', 'ilike', '%' . request('search') . '%')->paginate(10);
        endif;
        return response()->json([
            'pages' => $pages
        ]);
    }
}
