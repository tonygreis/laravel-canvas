<x-front-layout>
    <x-slot name="head">
        <title>{{ $serie->title }} | Laraveller</title>
        <meta name="description" content="{{ $serie->description }} laraveller." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $serie->title }} | Laraveller" />
        <meta property="og:description" content="{{ $serie->description }} laraveller." />
        <meta property="og:url" content="{{ route('series.show', $serie->slug) }}" />
        <meta property="og:locale" content="en" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="{{ $serie->title }} | Laraveller" />
        <meta name="twitter:description" content="{{ $serie->description }} laraveller." />
        <link href="https://laraveller.com/" rel="home" />
        <link href="{{ route('series.show', $serie->slug) }}" rel="canonical" />

        <meta property="og:image" content="{{ asset($serie->featured_image) }}">
    </x-slot>
    <section class="max-w-7xl mx-auto flex flex-wrap m-2 p-2 bg-yellow-400 rounded-xl">
        <div class="w-full md:w-1/2">
          <img class="lozad blur object-cover"
               data-src="{{ $serie->featured_image }}">
        </div>
        <div class="w-full md:w-1/2 p-4">
            <h1 class="text-2xl font-bold text-cyan-900">{{ $serie->title }}</h1>
           <p class="p-4">{{ $serie->description }}</p>
        </div>
    </section>
    <section class="max-w-7xl mx-auto min-h-screen m-2 p-2 bg-gray-100">
        <div class="w-full m-2 p-2">
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if($serie->episodes->count() > 0)
                    @foreach ($serie->episodes as $ep)
                        <li class="group-link-underline">
                            <a href="{{ route('episodes.show', [$serie->slug, $ep->id]) }}">
                             <x-front.episode-list>
                                <x-slot name="index">{{ $loop->iteration }}</x-slot>
                               <span class="link link-underline">
                                    {{ $ep->name }}
                               </span>
                             </x-front.episode-list>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
</x-front-layout>
