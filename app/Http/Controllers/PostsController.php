<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostModel::all();

        $dataTable = $posts->toArray();

        return view('pages.posts.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        PostModel::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => 3,
        ]);

        return redirect()->route('posts.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = PostModel::where('id', $id)->first();

        $existingPosts = $posts->toArray();

        return view('pages.posts.edit', compact('existingPosts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = PostModel::find($id);

        if(!$post) {
            return redirect()->route('posts.list')->with('error', 'Post not found.');
        }
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = PostModel::find($id);

        if(!$post) {
            return redirect()->route('posts.list')->with('error', 'Post not found.');
        }

        $post->delete();

        return redirect()->route('posts.list');
    }
}
