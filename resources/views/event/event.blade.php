@extends('layouts.header')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
   

    <form enctype="multipart/form-data" action="/event/store" method="post" class="space-y-6 bg-white p-8 shadow-lg rounded-lg">
        @csrf
        <!-- Event Name -->
        <div>
            <label for="name" class="block text-lg font-semibold mb-2">Event Name</label>
            <input type="text" name="name" placeholder="Name the event" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Event Description -->
        <div>
            <label for="description" class="block text-lg font-semibold mb-2">Event Description</label>
            <textarea name="description" placeholder="What's the event for?" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>

        <!-- Event Image -->
        <div>
            <label for="image" class="block text-lg font-semibold mb-2">Event Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Hidden User ID -->
        <select name="utulisateure_id" id="">
            <option >choose organizer</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-500 transition duration-300">Save Event</button>
        </div>
    </form>
</div>
@endsection
