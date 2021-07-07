<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <title>Add New book</title>
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
                    <form method="POST" action="/book" name="addNewBookForm" enctype="multipart/form-data">
                        @csrf

                        <div class="form-input form-group">
                            <label for="book_cover">Загрузите обложку для книги:</label>
                            <input class="form-control" type="file" name="img" id="book_cover" class="{{ $errors->has('img') ? 'is-invalid' : '' }}" value="{{ old('img', isset($offer) ? $offer->img : '') }}">
                        </div>

                        <div class="form-input form-group">
                            <label for="book_name">Введите название</label>
                            <input  class="form-control"  type="text" name="book_name" id="book_name" class="{{ $errors->has('book_name') ? 'is-invalid' : '' }}" value="{{ old('book_name', isset($offer) ? $offer->book_name : '') }}">
                        </div>

                        <div class="form-input form-group">
                            <label for="author_id">Введите автора</label>
                            <select class="form-control" type="text" name="author_id" id="author_id" class="{{ $errors->has('author_id') ? 'is-invalid' : '' }}" value="{{ old('author_id', isset($offer) ? $offer->author_id : '') }}">
                                @foreach ($authors as $author)
                                <option value="{{  $author->id }}">{{  $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Добавьте описание книги</label>
                            <textarea class="form-control" name="description" id="description" rows="3" class="{{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description', isset($offer) ? $offer->description : '') }}"></textarea>
                        </div>

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
