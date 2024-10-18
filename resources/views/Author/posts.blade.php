@extends('layouts.header')
@section('content')
<form action="/posts/store" method="post">
    @csrf
    <label for="name">create Post</label>
    <input name="description" type="text" placeholder="whats on your mind">

    <label for="users">Choose a user:</label>
    <select name="author_id" id="">
    <option selected>choose a user</option>
    @foreach ($users as $item)
   <option value={{ $item->id }}>{{ $item->name }}</option>
 
 @endforeach
</select>
    <button type="submit">send</button>
</form>
@endsection