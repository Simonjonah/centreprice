<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $view_allposts = Post::all();
        return response()->json($view_allposts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        $addpost = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json([
            'message' => 'Post successfully created',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $view_allposts = Post::where('id', $id)->first();
        return response()->json($view_allposts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        //
        $view_allposts = Post::where('id', $id)->first();

        
            $view_allposts->title = $request->title;
            $view_allposts->body = $request->body;
            $view_allposts->update();
       

        return response()->json([
            'message' => 'Post successfully updated',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
