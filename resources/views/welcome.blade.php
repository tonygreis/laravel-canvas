<x-front-layout>
    <x-slot name="head">
        <title>Laraveller - Laravel Posts, Packages and Tutorials</title>
        <meta name="description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Laraveller - Laravel Posts, Packages and Tutorials" />
        <meta property="og:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <meta property="og:url" content="https://www.laraveller.com" />
        <meta property="og:locale" content="en" />
        <meta property="og:image" content="{{ asset('img/logo.png') }}">
        <meta name="twitter:image" content="{{ asset('img/logo.png') }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="Laraveller - Laravel Posts, Packages and Tutorials" />
        <meta name="twitter:description" content="Laraveller new blog for Laravel and developers. We bring tutorials, and packages for the laravel framework community." />
        <link href="https://www.laraveller.com/" rel="home" />
        <link href="https://www.laraveller.com" rel="canonical" />
    </x-slot>
    <x-slot name="header">
          <x-front.welcome-section></x-front.welcome-section>
    </x-slot>
    <div class="container mx-auto">
         <section class="m-2 md:my-4 p-2 bg-gray-900 rounded-xl font-sans">
             <a href="#" class="flex">
                 <h1 class="mb-2 px-6 py-1 text-xl font-serif font-bold text-gray-100 bg-fuchsia-700 hover:bg-fuchsia-900 transition duration-300 ease-in-out rounded-full">
                     Free Series
                  </h1>
               </a>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                @foreach ($series as $serie)
                <li class="group">
                    <a class="" href="{{ route('series.show', $serie->slug) }}">
                        <x-front.card-two  class="mb-4 bg-gray-100 text-gray-700 transition duration-500 ease-in-out">
                            <x-slot name="image">
                                <img class="lozad object-cover object-center w-full h-44 opacity-90 group-hover:opacity-100 blur" data-src="{{ $serie->featured_image }}">
                            </x-slot>
                            <x-slot name="title">
                                <span class="link link-underline link-underline-white">{{ $serie->title }}</span>
                            </x-slot>
                        </x-front.card-two>
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
        @foreach ($topics as $topic)
        <section class="m-2 md:mt-4 p-2 bg-blueGray-100 rounded-xl">
               <a href="{{ route('topics.show', $topic->slug) }}" class="flex">
                 <h2 class="mb-2 px-6 py-1 text-xl font-serif font-bold titlo-color hover:text-fuchsia-600 transition duration-300 ease-in-out rounded-full">
                     {{ $topic->name }}
                  </h2>
               </a>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                @foreach ($topic->published_posts as $post)
                    <li class="group">
                    <a class="" href="{{ route('posts.show', $post->slug) }}">
                        <x-front.card-two  class="mb-4 bg-gray-100 text-gray-700 transition duration-500 ease-in-out">
                            <x-slot name="image">
                                <img class="lozad object-cover object-center w-full h-44 opacity-90 group-hover:opacity-100 blur" data-src="{{ $post->featured_image }}">
                            </x-slot>
                            <x-slot name="title">
                                <span class="link link-underline link-underline-white">{{ $post->title }}</span>
                            </x-slot>
                            @foreach ($post->tags as $tag)
                                <span class="text-fuchsia-500">#{{ $tag->name }}</span>
                            @endforeach
                        </x-front.card-two>
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
        @endforeach
    </div>
</x-front-layout>
