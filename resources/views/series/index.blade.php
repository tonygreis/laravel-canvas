<x-front-layout>
    <x-slot name="head">
        <title>Laraveller - Laravel Posts, Packages and Tutorials</title>
        <meta name="description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Laraveller - Laravel Posts, Packages and Tutorials" />
        <meta property="og:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:url" content="https://laraveller.com" />
        <meta property="og:locale" content="en" />
        <meta property="og:image" content="{{ asset('img/logo.png') }}">
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="Laraveller - Laravel Posts, Packages and Tutorials" />
        <meta name="twitter:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <link href="https://laraveller.com/" rel="home" />
        <link href="https://laraveller.com" rel="canonical" />
    </x-slot>
    <section class="max-w-7xl mx-auto min-h-screen m-2 p-2 bg-gray-100 rounded-xl">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
            @foreach ($series as $serie)
                <li class="group">
                    <a class="" href="{{ route('series.show', $serie->slug) }}">
                        <x-front.card-two  class="mb-4 bg-gray-100 group-hover:bg-gray-50 text-gray-700 transition duration-500 ease-in-out">
                            <x-slot name="image">
                                <div class="p-2">
                                    <img
                                        class="object-cover object-center w-full h-44 rounded-xl group-hover:opacity-90 transition duration-500 ease-in-out lozad blur"
                                        data-src="{{ $serie->featured_image }}">
                                </div>
                            </x-slot>
                            <x-slot name="title">
                                <span class="group-hover:text-gray-500">{{ $serie->title }}</span>
                            </x-slot>
                        </x-front.card-two>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="m-2 p-2">
            {{ $series->links() }}
        </div>
    </section>
</x-front-layout>
