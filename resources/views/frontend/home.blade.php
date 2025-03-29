<x-frontend-layout>
    <section>
        <div class="container grid grid-cols-12 gap-10 py-10">
            <div class="col-span-7">
                <a href="">
                    <img class="w-full" src="{{ asset($latest_article->image) }}" alt="{{ $latest_article->title }}">
                    <h1 class="text-2xl font-bold">{{ $latest_article->title }}</h1>
                </a>
            </div>



            <div class="col-span-5 space-y-4">
                <h2
                    class="text-2xl text-[var(--primary-color)] bg-[var(--light-primary-color)] py-4 px-2 border-l-4 border-[var(--primary-color)]">
                    ट्रेन्डिङ</h2>

                @foreach ($trending_articles as $hi)
                    <x-article-card :article="$hi" />
                @endforeach
            </div>
        </div>
    </section>


    <section>
        <div class="container space-y-10">
            @foreach ($categories as $category)
                <div>
                    <h2
                        class="text-2xl text-[var(--primary-color)] bg-[var(--light-primary-color)] py-4 px-2 border-l-4 border-[var(--primary-color)]">
                        {{ $category->nep_title }}
                    </h2>


                    <div class="grid grid-cols-3 gap-4 mt-5">
                        @foreach ($category->articles as $article)
                            <x-article-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-frontend-layout>
