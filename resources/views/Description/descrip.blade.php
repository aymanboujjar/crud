@extends('layouts.header')

@section('content')
    {{-- <div class="min-h-screen bg-white flex justify-center items-center">
        <form action="/desc/store" method="post" class="space-y-6 w-full max-w-md p-8 bg-white-800 rounded-lg shadow-lg">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-black-300">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm"
                    placeholder="Your Name" >
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-black-300">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm"
                    placeholder="you@example.com" >
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-black-300">Message</label>
                <input type="text" id="message" name="message"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm"
                    placeholder="Your message" >
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-black-300">Phone Number</label>
                <input type="number" id="phone" name="phone"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm"
                    placeholder="1234567890" >
            </div>

            <div>
                <label for="priority" class="block text-sm font-medium text-black-300">Email Priority</label>
                <select id="priority" name="priority"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm">
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-700">
                    Submit
                </button>
            </div>
        </form>
    </div>



     <div class="min-h-screen bg-white flex flex-col items-center">
        <form action="/" method="get" class="space-y-4 w-full max-w-md p-8 bg-white-800 rounded-lg shadow-lg mb-8">
            <h2 class="text-xl font-bold text-black mb-4">Filter Emails</h2>

            <div>
                <label for="priority" class="block text-sm font-medium text-black-300">Filter by Priority</label>
                <select id="priority" name="priority"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm">
                    <option value="">All</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>

            <div>
                <label for="read" class="block text-sm font-medium text-black-300">Filter by Read Status</label>
                <select id="read" name="read"
                    class="mt-1 block w-full p-2 border border-white-600 bg-white-900 text-black rounded-md shadow-sm sm:text-sm">
                    <option value="">All</option>
                    <option value="1" {{ request('read') === '1' ? 'selected' : '' }}>Read</option>
                    <option value="0" {{ request('read') === '0' ? 'selected' : '' }}>Unread</option>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-700">
                    Apply Filters
                </button>
            </div>
        </form>

        <div class="w-full max-w-4xl p-8 bg-white-800 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-6">Emails</h2>
            <ul class="space-y-4">
                @if(count($emails) > 0)
                    @foreach ($emails as $email)
                        <li class="bg-white-700 p-4 rounded-lg shadow flex justify-between items-center">
                            <div>
                                <p class="text-black"><strong>Name:</strong> {{ $email->name }}</p>
                                <p class="text-black"><strong>Email:</strong> {{ $email->email }}</p>
                                <p class="text-black"><strong>Phone:</strong> {{ $email->phone }}</p>
                                <p class="text-black"><strong>Priority:</strong> {{ ucfirst($email->priority) }}</p>
                                <label class="text-black flex items-center mt-2">
                                    <input type="checkbox" name="read"  class="mr-2">
                                    Mark as Read
                                </label>
                            </div>

                            <form action="/desc/delete/{{ $email->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white p-2 rounded-md hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </li>
                    @endforeach
                @else
                    <p class="text-black-400">No emails match the selected filters.</p>
                @endif
            </ul>
        </div>
    </div><form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" class="mb-4 p-4 border rounded-lg bg-gray-100 shadow-md">
        @csrf
        <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition duration-300">Upload Image</button>
    </form>
    
    @foreach ($images as $image)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $image->image_path ) }}" alt="Image" class="w-48 h-48 object-cover rounded-lg shadow-md mb-4">
            
            <form action="{{ route('image.update', $image->id) }}" method="POST" enctype="multipart/form-data" class="mb-4 p-4 border rounded-lg bg-gray-100 shadow-md">
                @csrf
                <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mb-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition duration-300">Update Image</button>
            </form>
    
            <form action="{{ route('image.destroy', $image->id) }}" method="POST" class="p-4 border rounded-lg bg-red-100 shadow-md">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition duration-300">Delete Image</button>
            </form>
        </div>
    @endforeach
     --}}
  
     <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold mb-4 text-center">Image Downloader</h1>
        <form action="/download-image" method="GET" class="space-y-4">
            <div>
                <input
                    type="url"
                    name="url"
                    placeholder="Enter image URL"
                    required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>
            <button
                type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition-colors duration-200"
            >
                Download Image
            </button>
        </form>
    </div>
        
    
@endsection
