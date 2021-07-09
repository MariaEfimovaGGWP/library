<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->book_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="main-info">
                        <div class="image-wrap"><img src="/storage/{{ $book->img }}" alt="{{ $book->book_name }}"></div>
                        <div class="book-info">
                            <p class="book-name">{{ $book->book_name }}</p>
                            <p class="book-author">{{ $book->author->name }}</p>
                            <p class="book-description">{{ $book->description }}</p>
                            <p class="book-readers mt-auto">
                                @foreach ($book->readers as $reader)
                                    {{ $reader->user->name }}@if($loop->iteration != $loop->count),&nbsp
                                    @endif
                                @endforeach
                            </p>

                            <a href="/book/create">
                                <button type="button" class="btn btn-secondary">Знаю книгу получше</button>
                            </a>
                            <a href="/book/{{ $book->id }}/edit">
                                <button type="button" class="btn btn-dark">Хочу исправить эту</button>
                            </a>

                            @if (Auth::check())
                                @if ($is_it_reader)
                                    <div class="readers-status">
                                        <p>Читаю</p>
                                    </div>
                                    <form method="POST" action="../reader/{{$book->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <x-input class="invisible" type="text" name="id" value="{{ $book->id }}"/>
                                        <button type="submit" class="btn btn-info">Перестать читать</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('reader.store')}}">
                                        @csrf
                                        <x-input class="invisible" type="text" name="user_id" value="{{ auth()->user()->id }}"/>
                                        <x-input class="invisible" type="text" name="book_id" value="{{ $book->id }}"/>
                                        <button type="submit" class="btn btn-success">Читать</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
