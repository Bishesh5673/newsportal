<x-frontend-layout :title="$category->eng_title" :key_words="$category->meta_keywords" :description="$category->meta_description">
    <section>
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-7 space-y-5">
                    @foreach ($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach

                    {{ $articles->links() }}
                </div>

                <div class="col-span-5">
                    @foreach ($advertises as $advertise)
                        @if ($advertise->location == 'category')
                            <a href="{{ $advertise->redirect_url }}" target="_blank">
                                <img class="h-[50px] md:h-[80px] lg:h-[100px]" src="{{ asset($advertise->image) }}"
                                    alt="">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
