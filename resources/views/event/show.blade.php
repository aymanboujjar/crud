@extends('layouts.header')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-8 bg-gray-100">
        @foreach ($users as $user)
            
        @foreach ($user->organisateur as $event)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img 
                    src="{{ asset('storage/images/' . $event->image) }}" 
                    alt="{{ $event->name }}" 
                    class="w-full h-48 object-cover"
                >
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-2 text-gray-800">{{ $event->name }}</h1>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p>by :{{ $user->name }}</p>
                    <button>Book now </button>
                </div>
            </div>
        @endforeach
        @endforeach
    </div>
@endsection
