<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostModel as Post;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Cache;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Cache::remember('posts', 60, function () {
            return Post::all();
        });

        return ApiResponse::success($posts);
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

        if(!$validated) {
            return ApiResponse::error('Validation Error', 422);
        }

        $posts = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        return ApiResponse::success($posts, "Post created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        if(!$post) {
            return ApiResponse::error('Post not found', 404);
        } 
            
        return ApiResponse::success($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if(!$post){
            return ApiResponse::error('Post not found', 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $post->update($validated);

        return ApiResponse::success($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if(!$post) {
            return ApiResponse::error('Post not found', 404);
        }

        $post->delete();

        return ApiResponse::success(null, 'Post deleted successfully');
    }
}
