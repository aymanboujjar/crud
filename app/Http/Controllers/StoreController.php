<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all = Store::where('quantity', '>', 0)->get();
        return view("store.store",compact("all"));
    }
  
    public function form()
    {
        //
        $all = Store::where('quantity', '>', 0)->get();

        return view("store.form", compact("all"));
    }
    public function filter(Request $request)
    {
        $query = Store::query();
    
        if ($request->has('size') && $request->size) {
            $query->where('size', $request->size);
        }

        if ($request->has('sort_price') && in_array($request->sort_price, ['asc', 'desc'])) {
            $query->orderBy('price', $request->sort_price);
        }
    
        
        $all = $query->get();
    
        return view("store.content", compact("all"));
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
            'image'=>'required',
            'title'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'size'=>'required',
            'catogery'=>'required',
        ]);
         $image = $request->image;

 
         $imageName = hash("sha256", data: file_get_contents($image)) . "." . $image->getClientOriginalExtension();
 
 
         $image->move(storage_path("app/public/images"), $imageName);
 

         Store::create([
            "image"=> $imageName,
            "title" => $request->title,
            "price" => $request->price,
            "stock" => $request->stock,
            "size" => $request->size,
            "priority" => $request->size,
            "catogery" => $request->catogery,
         ]);
         return back()->with("success","item created ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
        $store->delete();
        return back()->with("error","item deleted ");
    }
}
