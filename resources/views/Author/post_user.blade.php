@extends('layouts.header')

@section('content')
    <div class=" flex items-center justify-center bg-gray-50">
        <div class="flex flex-col p-8 w-[60vw] h-[80vh] shadow-lg bg-white rounded-lg ">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">{{ $author->name }}</h1>
            
            <div class="flex flex-col space-y-4">
                @foreach ($author->posts as $post)
                    <div class="p-6 bg-gray-100 border border-gray-300 rounded-lg shadow-sm transition-transform hover:scale-102 hover:shadow-md">
                        <p class="text-gray-800">{{ $post->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
