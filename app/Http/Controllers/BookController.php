<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AddNewBookRequest;
use App\Http\Requests\EditBookRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $authors = Author::get();
        return view('add-new-book', ['authors' => $authors]);
    }

    public function store(AddNewBookRequest $request)
    {
        $validated = $request->validated();

        $filename = 'img-'.time().rand(0, 5000).'.'.$validated['img']->getClientOriginalExtension();
        $img = Storage::disk('public')->putFileAs('img', $validated['img'], $filename);
        $validated['img'] = $img;

        $book = Book::updateOrCreate(
            ['book_name' => $validated['book_name'], 'author_id' => $validated['author_id']],
            $validated
        );

        $books = Book::with('author')->get();
        return view('/welcome', ['allBooks' => $books]);
    }

    public function show($id)
    {
        return view('/book', ['book' => Book::findOrFail($id)]);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('/edit-book', ['book' => Book::findOrFail($id), 'authors' => $authors]);
    }

    public function update(EditBookRequest $request, $id)
    {
        $validated = $request->validated();

        $book = Book::where('id', '=', $id);
        // $filename = 'img-'.time().rand(0, 5000).'.'.$validated['img']->getClientOriginalExtension();
        // $img = Storage::disk('public')->putFileAs('img', $validated['img'], $filename);
        // $validated['img'] = $img;

        $book->update($validated);

        return view('/book', ['book' => Book::findOrFail($id)]);
    }

    public function destroy($id)
    {
        //
    }
}
