@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <label for="body" class="sr-only">Текст</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded lg @error('body') border-red-500 @enderror" placeholder="Текст поста"></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-3 rounded font-medium">Опубликовать</button>
            </form>
        </div>
    </div>
@endsection
