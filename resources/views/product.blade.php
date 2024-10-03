@extends('layouts.header')

@section('content')

<form action="/product/store" method="post" class="space-y-4 mb-10 p-6 bg-black rounded-lg shadow-md">
    @csrf
    <div class="flex flex-col">
        <label for="name" class="mb-2 text-white font-semibold">Name</label>
        <input type="text" name="name" id="name" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="description" class="mb-2 text-white font-semibold">Description</label>
        <input name="description" id="description" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="price" class="mb-2 text-white font-semibold">Price</label>
        <input type="number" name="price" id="price" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex flex-col">
        <label for="stock" class="mb-2 text-white font-semibold">Stock</label>
        <input type="number" name="stock" id="stock" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="size" value="S" id="size_s" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_s" class="text-white font-semibold">S</label>
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="size" value="M" id="size_m" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_m" class="text-white font-semibold">M</label>
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="size" value="L" id="size_l" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="size_l" class="text-white font-semibold">L</label>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Submit
    </button>
</form>




<table class="min-w-full table-auto bg-gray-800 shadow-lg rounded-lg">
    <thead>
        <tr class="bg-purple-600 text-left text-white">
            <th class="p-4 text-center">Name</th>
            <th class="p-4 text-center">Description</th>
            <th class="p-4 text-center">Price</th>
            <th class="p-4 text-center">Stock</th>
            <th class="p-4 text-center">Size</th>
            <th class="p-4 text-center">Show Product</th>
            <th class="p-4 text-center">Edit Product</th>
            <th class="p-4 text-center">Delete Product</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr class="border-b border-purple-400">
            <td class="p-4 text-center text-purple-200">{{ $product->name }}</td>
            <td class="p-4 text-center text-purple-200">{{ $product->description }}</td>
            <td class="p-4 text-center text-purple-200">{{ $product->price }}</td>
            <td class="p-4 text-center text-purple-200">{{ $product->stock }}</td>
            <td class="p-4 text-center text-purple-200">{{ $product->size }}</td>
            <td class="p-4 text-center bg-black text-center text-purple-200"><a href="/product/show/{{ $product->id }}">Show</a></td>

            <td class="p-4 bg-black text-center text-purple-200"><a href="/product/edit/{{ $product->id }}">Edit</a></td>

            <td class="p-4 bg-red-600 text-center text-purple-200">
                <form action="/product/delete/{{ $product->id }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection

