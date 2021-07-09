<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditReaderListRequest;
use \App\Models\Book;
use \App\Models\Reader;
use Illuminate\Support\Facades\Auth;

class ReaderController extends Controller
{
    public function store(EditReaderListRequest $request)
    {
        $validated = $request->validated();
        $reader = Reader::updateOrCreate($validated);

        $book_id = $validated['book_id'];
        $book = Book::findOrFail($book_id);
        $user_id = Auth::id();
        $is_it_reader = false;
        if (Reader::where('book_id', '=', $book_id)->where('user_id', '=', $user_id)->exists()) {
            $is_it_reader = true;
        };
        return view('/book', ['book' => $book, 'is_it_reader' => $is_it_reader, 'user_id' => $user_id]);
    }
    public function destroy($book_id)
    {
        $user_id = Auth::id();
        Reader::where(['book_id'=>$book_id, 'user_id'=>$user_id])->delete();

        $book = Book::findOrFail($book_id);
        $is_it_reader = false;
        return view('/book', ['book' => $book, 'is_it_reader' => $is_it_reader, 'user_id' => $user_id]);
    }
}
