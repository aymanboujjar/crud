@extends('layouts.header')

@section('content')
<h1>show</h1>
<table class="min-w-full table-auto bg-gray-800 shadow-lg rounded-lg">
    <thead>
        <tr class="bg-purple-600 text-left text-white">
            <th class="p-4 text-center">Name</th>
            <th class="p-4 text-center">Description</th>
            <th class="p-4 text-center">Price</th>
            <th class="p-4 text-center">Stock</th>
            <th class="p-4 text-center">Size</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-purple-400">
            <td class="p-4 text-purple-200 text-center">{{ $product->name }}</td>
            <td class="p-4 text-purple-200 text-center">{{ $product->description }}</td>
            <td class="p-4 text-purple-200 text-center">{{ $product->price }}</td>
            <td class="p-4 text-purple-200 text-center">{{ $product->stock }}</td>
            <td class="p-4 text-purple-200 text-center">{{ $product->size }}</td>
            <td class="p-4 bg-black text-center text-purple-200"><a class="" href="/">Back</a></td>
        </tr>
    </tbody>
</table>

@endsection