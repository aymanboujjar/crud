@extends('layouts.header')
@section('content')
    <form action="/student/store" method="POST">
        @csrf
        <label for="">student name</label>
        <input type="text" placeholder="student name" name="name">
        <button type="submit">save</button>
    </form>
@endsection