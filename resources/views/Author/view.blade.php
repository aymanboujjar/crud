@extends('layouts.header')
@section('content')
<div class="flex flex-col items-center justify-center w-full">
    <h1 class="text-3xl font-bold mb-6">Posts</h1>

    <ul class="w-full max-w-3xl space-y-6">
        @foreach ($users as $author)
        <h1>{{ $author->name }}</h1>
        @foreach ($author->books as $post)
        <div class="p-6 bg-gray-100 border border-gray-300 rounded-lg shadow-sm transition-transform hover:scale-102 hover:shadow-md">
            <p class="text-gray-800">{{ $post->description }}</p>
        </div>
        {{-- @foreach ($post->images as $image)
            <p>{{ $image }}</p>
        @endforeach --}}
        @if ($post->images->count() > 0)
        <div id="blogCarousel{{ $loop->iteration }}" class="carousel slide w-80 h-80 ">
            <div class="carousel-inner">
                
                @foreach ($post->images as $index => $image)
                <div class="carousel-item {{ $index == 0 ? "active" : "" }}">
                    
                    <img class=" "
                        src="{{ asset('storage/images/' . $image->image) }}" alt="">
                    </div>
                @endforeach
            </div>
            @if ($post->images->count() > 1)
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#blogCarousel{{ $loop->iteration }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#blogCarousel{{ $loop->iteration }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
        @endif
        @foreach ($post->pdfs as $pdf)
        <iframe src="{{ asset('storage/pdfs/' . $pdf->pdf) }}" width="100%" height="600px"></iframe>

        @endforeach
    @endforeach
       
        @endforeach  
    </ul>
 
</div>
@endsection
