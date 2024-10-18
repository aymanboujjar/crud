@extends('layouts.header')
@section('content')
    <form enctype="multipart/form-data" action="/imgs" method="post">
        @csrf
        <input name="images[]" multiple accept="image/*" type="file">
        <input name="pdfs[]" multiple accept="application" type="file">
        <label for="books">Choose a book:</label>
        <select name="book_id" id="">
        <option selected>choose a book</option>
        @foreach ($users as $item)
        @foreach ($item->books as $book)
        <option value={{ $book->id }}>{{ $book->description }}</option>
            
        @endforeach
     @endforeach
        </select>
     
        <button type="submit">save</button>
    </form>
@endsection
