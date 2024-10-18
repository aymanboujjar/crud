@extends('layouts.header')
@section('content')
    <form action="/user/store" method="post">
        @csrf
        <label for="name">user name</label>
        <input name="name" type="text" placeholder="Enter User name">
        <button type="submit">send</button>
    </form>

   
@endsection