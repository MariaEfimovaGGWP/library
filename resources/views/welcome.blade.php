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
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
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
                                <p>{{ mb_substr($book->description, 0, 100) }}<span class="dots">...</span><span class="more">{{ mb_substr($book->description, 100) }}</span></p>
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
