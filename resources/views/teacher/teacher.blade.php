@extends('layouts.header')
@section('content')
    <form action="/teacher/store" method="post">
        @csrf
        <label for="">teacher name</label>
        <input type="text" placeholder="teacher name" name="name"> 
        <button type="submit">save</button>
    </form>
@endsection