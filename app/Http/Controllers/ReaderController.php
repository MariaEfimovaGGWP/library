<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditReaderListRequest;
use \App\Models\Book;
use \App\Models\Reader;

class ReaderController extends Controller
{
    public function store(EditReaderListRequest $request)
    {
        $validated = $request->validated();
        $reader = Reader::create($validated);

        $id =$validated['book_id'];

        return view('/book', ['book' => Book::findOrFail($id)]);
    }
}
