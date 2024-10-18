<?php

namespace App\Http\Controllers;

use App\Models\utulisateure;
use Illuminate\Http\Request;

class UtulisateureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("user.user");
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
            "role"=>"required"
        ]);
            utulisateure::create([
                "name"=>$request->name,
                "role"=>$request->role
            ]);
            if ($request->role == "organizer") {
                return redirect()->route("event.event");
            } else {
                return redirect()->route("event.show"); 
            }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(utulisateure $utulisateure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(utulisateure $utulisateure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, utulisateure $utulisateure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(utulisateure $utulisateure)
    {
        //
    }
}
