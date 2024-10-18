
@extends('layouts.header')
@section('content')
    <form enctype="multipart/form-data" action="/book/store" method="post">
        @csrf
        <label for="description">Choose a book name:</label>
        <input type="text" name="description">
        <label for="users">Choose a user:</label>
        <select name="author_id" id="">
        <option selected>choose a user</option>
        @foreach ($users as $item)
       <option value={{ $item->id }}>{{ $item->name }}</option>
     @endforeach
        </select>
     
        <button type="submit">save</button>
    </form>
@endsection

