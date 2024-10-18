<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Images;
use App\Models\Post;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=Post::all();
        $imagess = Images::all();
        return view("Author.images",compact("imagess","users"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'images.*' => 'required|image',
            "post_id"=>"required"
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                
                $fileName = hash("sha256", file_get_contents($image)) . "." . $image->getClientOriginalExtension();
                
                $image->move(storage_path('app/public/images'), $fileName);
                
                Images::create([
                    'file_path' => $fileName,
                    "post_id"=>$request->post_id
                ]);
            }
        }


        return back()->with('success', 'Images uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images)
    {
        //
    }
}
