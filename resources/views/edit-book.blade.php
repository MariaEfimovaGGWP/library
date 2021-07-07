<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <title>Edit book</title>
    </head>
    <body class="add-new-book-page">
        <div class="wrapper">
            <main clas="content">
                <header>
                    <div class="navbar navbar-expand-lg navbar-light bg-white">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="/catalog">Catalog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/book/create">Add new book</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <section class="page-wrapper">
                    <form method="POST" action="../{{$book->id}}" name="EditBookForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-input form-group">
                            <label for="book_name">Название</label>
                            <input value="{{ $book->book_name}}" class="form-control"  type="text" name="book_name" id="book_name" class="{{ $errors->has('book_name') ? 'is-invalid' : '' }}" value="{{ old('book_name', isset($offer) ? $offer->book_name : '') }}">
                        </div>

                        <div class="form-input form-group">
                            <label for="author_id">Автор</label>
                            <select class="form-control" type="text" name="author_id" id="author_id" class="{{ $errors->has('author_id') ? 'is-invalid' : '' }}" value="{{ old('author_id', isset($offer) ? $offer->author_id : '') }}">
                                @foreach ($authors as $author)
                                <option value="{{  $author->id }}">{{  $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" name="description" id="description" rows="3" class="{{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description', isset($offer) ? $offer->description : '') }}">{{ $book->description }}</textarea>
                        </div>

                        <!-- <div class="form-input form-group">
                            <input  class="form-check-input"  type="checkbox" name="reader" id="reader" class="{{ $errors->has('reader') ? 'is-invalid' : '' }}" value="{{ old('reader', isset($offer) ? $offer->reader : '') }}">
                            <label class="form-check-label" for="reader">Сейчас читаю ее</label>
                        </div> -->

                        <input class="btn btn-primary" type="submit" value="Опубликовать">
                    </form>
                </section>
                <footer>
                    <div class="footer-content">
                        <h2>
                            A room without books is like a body without a soul.
                        </h2>
                    </div>
                </footer>
                <script src="{{ URL::asset('js/app.js') }}"></script>
            </main>
        </div>
    </body>
</html>
