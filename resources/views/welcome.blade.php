<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <title>Library</title>
    </head>
    <body class="catalog-page">
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
                    @foreach ($allBooks as $book)
                    <div class="book-card">
                        <a href="{{ config('app.url')}}/book/{{ $book->id }}"><p>{{ $book->book_name }}</p></a>
                        <p>{{ $book->author->name }}</p>
                        <div>
                            <img src="/storage/{{ $book->img }}" alt="{{ $book->book_name }}">
                        </div>
                        <div class="summary">
                            <p class="collapse" class="collapseSummary">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span class="dots">...</span><span class="more">{{ $book->description }}</span></p>
                                <button class="myBtn">Read more</button>
                            </p>
                            <a class="collapsed mt-auto" data-toggle="collapse" href="#collapseSummary" aria-expanded="false" aria-controls="collapseSummary"></a>
                        </div>
                        <p class="mt-auto">
                        @foreach ($book->readers as $reader)
                            {{ $reader->user->name }}@if ($loop->iteration != $loop->count),&nbsp
                            @endif
                        @endforeach
                        </p>
                    </div>
                    </br>
                    @endforeach

                    <div class="book-card add-new-book">
                        <a href="{{ config('app.url')}}/book/create">Добавь книгу, которой здесь нет</a>
                        <div>
                            <img src="storage/img/empty-book.jpg" alt="Add your best book">
                        </div>
                    </div>
                </section>
                <footer>
                    <div  class="footer-content">
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
