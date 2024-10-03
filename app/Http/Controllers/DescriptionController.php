<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Image;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $priorityFilter = $request->input('priority');
    $images= Image::all();

    $query = Description::query();

    if ($priorityFilter) {
        $query->where('priority', $priorityFilter);
    }



    $emails = $query->get();

    return view('Description.descrip', compact('emails',"images"));
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
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
            'phone'=>'required',
            'priority'=>'required',
        ]);

        Description::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'phone'=>$request->phone,
            'priority'=>$request->priority,
        ]);


        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Description $description)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Description $desc)
    {
        //
        $desc->delete();
        return back();
    }
}
