@extends('layouts.header')
@section('content')
    @foreach ($all as $item)
        <h1>{{ $item->id }}</h1>
    @endforeach
@endsection