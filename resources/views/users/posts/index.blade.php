@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->username }}</h1>
                <p>Опубликовано {{ $posts->count() }} постов и имеет {{ $user->recivedLikes()->count() }} лайков</p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post" />
                    @endforeach

                    <hr>
                    {{ $posts->links() }}
                @else
                    <p>Пользователь {{ $user->username }} не имеет постов <i>:(</i></p>
                @endif
            </div>
        </div>
    </div>
@endsection
