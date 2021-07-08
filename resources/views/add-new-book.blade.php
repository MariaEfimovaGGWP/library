<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="page-wrapper">
                        <form method="POST" class="add-new-book-form" action="/book" name="addNewBookForm" enctype="multipart/form-data">
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

                            <!-- <div class="form-input form-group">
                                <input  class="form-check-input"  type="checkbox" name="reader" id="reader" class="{{ $errors->has('reader') ? 'is-invalid' : '' }}" value="{{ old('reader', isset($offer) ? $offer->reader : '') }}">
                                <label class="form-check-label" for="reader">Сейчас читаю ее</label>
                            </div> -->

                            <input class="btn btn-primary" type="submit" value="Опубликовать">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
