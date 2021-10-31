<x-base-layout>
    <main class="min-h-screen">
        <section class="container text-gray-900 pt-24 mx-auto space-y-4">

            <article>
                <h1 class="font-bold">{{ $post->title }}</h1>

                <div>
                    {!! $post->body !!}
                </div>
            </article>

        </section>
    </main>
</x-base-layout>