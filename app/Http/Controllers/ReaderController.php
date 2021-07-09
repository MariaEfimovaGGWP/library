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

        return redirect()->to('/book/'.$validated['book_id']);
    }
    public function destroy($book_id)
    {
        $user_id = Auth::id();
        Reader::where(['book_id'=>$book_id, 'user_id'=>$user_id])->delete();

        return redirect()->to('/book/'.$book_id);
    }
}
