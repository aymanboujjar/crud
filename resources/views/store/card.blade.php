@extends('layouts.header')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if($cards->isEmpty())
        <p class="text-lg text-gray-600">Your cart is currently empty.</p>
    @else
        <div class="flex flex-col">
            @foreach($cards as $card)
                <div class="flex justify-between items-center border-b py-4">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/images/' . $card->image) }}" alt="{{ $card->title }}" class="w-20 h-20 mr-4 rounded-md shadow-md">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $card->title }}</h2>
                            <p class="text-gray-600">${{ number_format($card->price, 2) }}</p>
                            <p class="text-gray-500">Quantity: {{ $card->quantity }}</p>
                        </div>
                    </div>
                    <form action="/cart/{{ $card->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex">

                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold mr-6">Remove</button>
                            <h1>{{ $card->created_at->format('D.M.Y') }}</h1>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Total: ${{ number_format($cards->sum(function($card) {
            return $card->price * $card->quantity;}), 2) }}</h2>
    </div>
</div>
@endsection
