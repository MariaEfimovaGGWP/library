<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Book;
use \App\Models\Author;
use \App\Models\Reader;


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

        return redirect()->to('catalog');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $user_id = Auth::id();

        $is_it_reader = false;
        if (Reader::where('book_id', '=', $id)->where('user_id', '=', $user_id)->exists()) {
            $is_it_reader = true;
        };

        return view('/book', ['book' => $book, 'is_it_reader' => $is_it_reader, 'user_id' => $user_id]);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('/edit-book', ['book' => Book::findOrFail($id), 'authors' => $authors]);
    }

    public function update(EditBookRequest $request, $id)
    {
        $book = Book::where('id', '=', $id);
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img');

            $filename = 'img-'.time().rand(0, 5000).'.'.$validated['img']->getClientOriginalExtension();
            $img = Storage::disk('public')->putFileAs('img', $validated['img'], $filename);
            $validated['img'] = $img;
        };

        $book->update($validated);

        return redirect()->to('catalog');
    }

    public function destroy($book_id)
    {
        Reader::where(['book_id'=>$book_id])->delete();
        Book::where(['id'=>$book_id])->delete();

        return redirect()->to('catalog');
    }
}
