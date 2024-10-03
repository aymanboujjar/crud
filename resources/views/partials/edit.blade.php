@extends('layouts.header')

@section('content')
<h1>edit  {{ $product->name }}</h1>
<form action="/product/update/{{ $product->id }}" method="post" class="space-y-4 mb-10 p-6 bg-black rounded-lg shadow-md">
    @csrf
    @method('PUT')
    <div class="flex flex-col">
        <label for="name" class="mb-2 text-white font-semibold">Name</label>
        <input value="{{ old('name', $product->name) }}" type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="description" class="mb-2 text-white font-semibold">Description</label>
        <input value="{{ old('description', $product->description) }}" name="description" id="description" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="price" class="mb-2 text-white font-semibold">Price</label>
        <input value="{{ old('price', $product->price) }}" type="number" name="price" id="price" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="stock" class="mb-2 text-white font-semibold">Stock</label>
        <input value="{{ old('stock', $product->stock) }}" type="number" name="stock" id="stock" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex items-center space-x-2">
        <input @checked($product->size == 'S')  type="checkbox" name="size" value="S" id="size_s" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_s" class="text-white font-semibold">S</label>
    </div>

    <div class="flex items-center space-x-2">
        <input @checked($product->size == 'M') type="checkbox" name="size" value="M" id="size_m" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_m" class="text-white font-semibold">M</label>
    </div>

    <div class="flex items-center space-x-2">
        <input @checked($product->size == 'L') type="checkbox" name="size" value="L" id="size_l" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_l" class="text-white font-semibold">L</label>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Submit
    </button>
</form>

@endsection