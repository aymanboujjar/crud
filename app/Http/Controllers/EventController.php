<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\utulisateure;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         // Retrieve the user based on the ID passed in the route
         $users = utulisateure::all()->where("role","organizer");

         // Pass the user data to the 'event.event' view
         return view('event.event', compact('users'));
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
        request()->validate([
            "name"=>"required",
            "description"=>"required",
            "image"=>"required",
            "utulisateure_id"=>"required"
        ]);
        

        $image = $request->image;


        $fileName = hash("sha256", file_get_contents($image)) . "." . $image->getClientOriginalExtension();


        $image->move(storage_path("app/public/images"), $fileName);
        event::create([
            "name" => $request->name,
            "description" => $request->description,
            "image"=>$fileName,
            "utulisateure_id"=>$request->utulisateure_id
        ]);
        return redirect()->route("event.show"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
        $evnts=event::all();
        $users=utulisateure::all();
        return view("event.show",compact("evnts","users"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
