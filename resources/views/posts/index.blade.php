@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts.store') }}" method="post" class="mb-4">
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
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <a href="#" class="font-bold">{{ $post->user->username }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="mb-2">
                        {{ $post->body }}
                    </p>

                    <div class="flex items-center">
                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-2">
                                @csrf
                                <button type="submit" class="text-blue-500">Нравится</button>
                            </form>
                        @else
                            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-2">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-blue-500">Не нравится</button>
                            </form>
                        @endif
                        <span>{{ $post->likes->count() }} нравится</span>
                    </div>

                @endforeach

                {{ $posts->links() }}
            @else
                <p>Постов пока что нет <i>:(</i></p>
            @endif
        </div>
    </div>
@endsection
