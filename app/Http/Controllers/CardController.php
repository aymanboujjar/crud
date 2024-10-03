<?php

namespace App\Http\Controllers;

use App\Models\Card; 
use App\Models\Store; 
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view("store.card", compact('cards'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
        ]);

        $store = Store::find($request->store_id);

        $card = Card::where('store_id', $store->id)->first();

        if ($card) {
            $store->stock --;
            $store->save();
            $card->quantity++;
            $card->save();
        } else {
            Card::create([
                'store_id' => $store->id,
                'title' => $store->title,
                'price' => $store->price,
                'image' => $store->image,
                'quantity' => 1,
            ]);
        }

        return back();
    }

    public function destroy(Card $card)
    {
        if ($card->quantity > 1) {
            $card->quantity--;
            $card->save(); 
        } else {
            $card->delete();
        }
    
        return back();
    }
    
}
