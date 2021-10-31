<div class="bg-white shadow p-2">
    <a href="{{ route('show', $post->slug) }}">
    <h2 class="text-xl font0bold">{{ $post->title }}</h2>
    <p>{!! Str::limit($post->body, 200, '...') !!}</p>
</a>
</div>