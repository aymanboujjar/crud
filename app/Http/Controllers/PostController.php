<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts=Post::all();
        $users=Author::all();

        return view("Author.view",compact("posts","users"));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users=Author::all();

        return view("Author.posts",compact("users"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "author_id"=>"required",
            "description" => "required",
        ]);
                Post::create([
            "author_id"=> $request->author_id,
            "description" =>$request->description,
            
        ]);
        // dd($request);
        return back()->with("success","posts created ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
