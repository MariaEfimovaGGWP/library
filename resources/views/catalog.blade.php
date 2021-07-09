<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                                <img src="/storage/img/empty-book.jpg" alt="Add your best book">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
