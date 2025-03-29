@props(['article'])
<div>
    <a href="{{ route('article', $article->id) }}"
        class="grid grid-cols-12 duration-200 gap-4 h-[100px] border overflow-hidden rounded-md hover:shadow-lg">
        <div class="col-span-5">
            <img class="h-[100%] w-full object-cover" src="{{ asset($article->image) }}" alt="{{ $article->title }}">
        </div>
        <div class="col-span-7">
            <h3>{{ $article->title }}</h3>
            <small>
                {{ nepalidate($article->created_at) }}
            </small>
        </div>
    </a>
</div>
