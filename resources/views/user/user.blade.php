@extends('layouts.header') 
@section('content')     
<div class="flex justify-center items-center h-screen bg-gray-100">
    <form action="/people/store" method="post" class="bg-white p-6 rounded-lg shadow-lg">
        <h1>Hello Heloo whats up welcome please fill with ur info to regester</h1>
        @csrf
        <div class="mb-4">
            <input
            required
                type="text" 
                name="name" 
                placeholder="Enter user name" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            />
        </div>
        <div class="mb-4">
            <select 
                required
                name="role" 
                id="role" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option selected> Select a type </option>
                <option value="user">User</option>
                <option value="organizer">Organizer</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Save
            </button>
        </div>
    </form>
</div>
@endsection
