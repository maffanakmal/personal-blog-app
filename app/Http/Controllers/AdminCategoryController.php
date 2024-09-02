<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' =>'required|max:255',
            'slug' =>'required|unique:categories',
            'image' =>'image|file|max:1048',
        ]);

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('post-images');
        }

        Category::create($validate);

        return redirect('/dashboard/categories')->with('success', 'Create new post successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view('dashboard.categories.show', [
            'categories' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $rules = [
            'name' =>'required|max:255',
            'slug' =>'required',
            'image' =>'image|file|max:1048',
        ];

        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validate = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('post-images');
        }

        Category::where('id', $category->id)->update($validate);

        return redirect('/dashboard/categories')->with('success', 'Update category successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        if($category->image) {
            Storage::delete($category->image);
        }
        
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Successful delete category!');
    }

    public function checkCategorySlug(Request $request) {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        
        return response()->json(['slug' => $slug]);
    }
}
