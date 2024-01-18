<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllers\Category\StoreRequest;
use App\Http\Requests\AdminControllers\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category.index', compact('categories','user'));
    }

    public function show($category_slug)
    {
        $user = Auth::user();
        $item = Category::whereSlug($category_slug)->firstOrFail();
        return view('admin.category.show', compact('item','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.category.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
            endif;  
      
        Category::firstOrCreate($data);
        
        return redirect()->route('admin.categories.index')->with('status', 'item-created');
    }
    public function edit($category_slug)
    {
        $user = Auth::user();
        $item = Category::whereSlug($category_slug)->firstOrFail();
        return view('admin.category.edit', compact('user','item'));
    }
    public function update(UpdateRequest $request, $category_slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrFail();
        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
            endif;  

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('status', 'item-updated');
    }
    
    public function destroy($category_slug)
    {

        $category = Category::whereSlug($category_slug)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $categories = Category::orderBy('id', 'DESC')->paginate(10);
        else :
            $categories = Category::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.category.index', compact('categories','user'));
    }
    protected function loadFile(Request $request,$data)
    {
        // Имя и расширение файла
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        // Только оригинальное имя файла
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = str_replace(' ', '_', $filename);
        // Расширение
        $extention = $request->file('image')->getClientOriginalExtension();
        // Путь для сохранения
        $fileNameToStore = "image/" . $filename . "_" . time() . "." . $extention;
        // Сохраняем файл
        $data = $request->file('image')->storeAs('public', $fileNameToStore);
        return $data;
    }
}
