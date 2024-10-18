@extends('layouts.header')
@section('content')
    
    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" multiple>
    <label for="users">Choose a user:</label>
    <select name="post_id" id="">
    <option selected>choose a user</option>
    @foreach ($users as $item)
   <option value={{ $item->id }}>{{ $item->description }}</option>
 
 @endforeach
</select>
    <button type="submit">Upload Images</button>
</form>



@foreach ($users as $user)
<div id="carouselExample{{ $user->id }}" class="carousel slide">
  <div class="carousel-inner">
        
    @foreach ($user->imagess as $index => $item)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <img src="{{ asset('storage/images/' . $item->file_path) }}" class="h-[50vh] w-100" alt="...">
      </div>
    @endforeach
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $user->id }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $user->id }}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endforeach

@endsection