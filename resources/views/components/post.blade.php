@props(['post' => $post])

<hr>
<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
</div>
<p class="mb-2">
    {{ $post->body }}
</p>
@auth
    @if($post->ownedBy(auth()->user()))
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="text-red-500">Удалить</button>
        </form>
    @endif
@endauth

<div class="flex items-center mb-5">
    @auth
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
    @endauth
    <span>{{ $post->likes->count() }} нравится</span>
</div>
