@extends('layouts.header')

@section('content')
<div class="bg-gradient-to-r from-black to-green-500  h-screen flex items-center justify-center">

    <div class="flex justify-center w-[50vw]">
        <div class="w-full max-w-md bg-gradient-to-r from-green-500 to-black rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-white mb-6">To Do List</h1>

            <form action="/todo/store" method="post" class="mb-4">
                @csrf
                <div class="flex items-center space-x-4">
                    <input type="text" name="task" placeholder="Add a new task" 
                        class="flex-grow   border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-pink-500"
                        required />
                    <button type="submit" class="bg-green-500  text-white font-bold py-2 px-4 rounded-lg">
                        Add
                    </button>
                </div>
            </form>



            <ul class="space-y-2">
                @foreach ($tasks as $task)
                    <li class="flex justify-between items-center p-2 font-bold border-b border-gray-200">
                        <span class="text-white">{{ $task->task }}</span>
                        
                        <div class="flex items-center space-x-2"> 
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg" type="button">
                                Update
                            </button>

                            <form action="/todo/delete/{{ $task->id }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-700 text-white px-4 py-2 rounded-lg" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>


            

        </div>
    </div>
</div>

@endsection
