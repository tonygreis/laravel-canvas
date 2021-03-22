<x-front-layout>
    <x-slot name="head">
        <title>{{ $tag->name }} | Laravel Post Laraveller</title>
        <meta name="description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $tag->name }} | Laravel Post Laraveller" />
        <meta property="og:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:url" content="{{ route('tags.show', $tag->slug) }}" />
        <meta property="og:locale" content="en" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="{{ $tag->name }} | Laravel Post Laraveller" />
        <meta name="twitter:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <link href="https://laraveller.com/" rel="home" />
        <link href="{{ route('tags.show', $tag->slug) }}" rel="canonical" />
    </x-slot>
    <section class="max-w-7xl mx-auto min-h-screen m-2 p-2 bg-gray-100 rounded-xl">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
            @foreach ($posts as $post)
                <li class="group">
                    <a class="" href="{{ route('posts.show', $post->slug) }}">
                        <x-front.card-two  class="mb-4 bg-gray-100 text-gray-700 transition duration-500 ease-in-out">
                            <x-slot name="image">
                                <img
                                    class="object-cover object-center w-full h-44 opacity-90 group-hover:opacity-100 lozad blur"
                                    data-src="{{ $post->featured_image }}">
                                <div class="flex items-center px-6 py-3 bg-gray-900">
                                    <h1 class="mx-3 text-lg font-semibold text-fuchsia-500">
                                        @if(isset($post->topic[0]['name']))
                                        {{ $post->topic[0]['name'] }}
                                        @endif
                                    </h1>
                                </div>
                            </x-slot>
                            <x-slot name="title">
                                <span class="link link-underline link-underline-white">{{ $post->title }}</span>
                            </x-slot>
                        </x-front.card-two>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="m-2 p-2">
            {{ $posts->links() }}
        </div>
    </section>
</x-front-layout>
