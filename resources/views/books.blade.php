<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <title></title>
    </head>
    <body class="books-page">
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
