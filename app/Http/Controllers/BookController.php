<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AddNewBookRequest;
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
        // $path = $request->file('img')->store('img');
        // $validated['img'] = $path;

        $validated = $request->validated();

        $filename = 'img-'.time().rand(0, 5000).'.'.$validated['img']->getClientOriginalExtension();
        $img = Storage::disk('public')->putFileAs('img', $validated['img'], $filename);
        $validated['img'] = $img;
        //fasad storage
        // move_uploaded_file($_FILES["img"]["tmp_name"], "img/".$_FILES["img"]["name"]);
        // $validated['img'] = "img/".$_FILES["img"]["name"];

        $book = Book::create($validated);

        $books = Book::with('author')->get();
        return view('/welcome', ['allBooks' => $books]);
    }

    public function show($id)
    {
        return view('/book', ['book' => Book::findOrFail($id)]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
