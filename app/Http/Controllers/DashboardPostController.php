<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' =>'required|max:255',
            'slug' =>'required|unique:posts',
            'category_id' =>'required',
            'image' =>'image|file|max:1048',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('post-images');
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validate);

        return redirect('/dashboard/posts')->with('success', 'Create new post successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' =>'required|max:255',
            'category_id' =>'required',
            'image' =>'image|file|max:1048',
            'body' => 'required',
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validate = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('post-images');
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validate);

        return redirect('/dashboard/posts')->with('success', 'Update post successful!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Successful delete post!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        
        return response()->json(['slug' => $slug]);
    }
}
