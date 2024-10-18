<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Image;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=Author::all();

        return view("exo2.view",compact("users"));
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
        //
        $request->validate([
            "images.*"=>"required",
            "pdfs.*"=>"required",
            "book_id"=>"required"
        ]);
        // dd($request->book_id);
        $images=$request->images;
        $pdfs=$request->pdfs;
        
        if ($images) {
            foreach ($images as $image) {
                $file = file_get_contents($image);
                $fileName = hash("sha256", $file) . "." . $image->getClientOriginalExtension();
                Storage::disk("public")->put("images/" . $fileName, $file);
                Image::create([
                    "image" => $fileName,
                    "book_id" => $request->book_id
                ]);
            }
        }
        if ($pdfs) {
            foreach ($pdfs as $pdf) {
                $file = file_get_contents($pdf);
                $fileName = hash("sha256", $file) . "." . $pdf->getClientOriginalExtension();
                Storage::disk("public")->put("pdfs/" . $fileName, $file);
                Pdf::create([
                    "pdf" => $fileName,
                    "book_id" => $request->book_id
                ]);
            }
        }   

    return back()->with("success","tranzabadn");
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
