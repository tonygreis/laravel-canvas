<x-front-layout>
    <x-slot name="head">
        <title>{{ $serie->title }} | {{ $episode->name }} | Laraveller</title>
        <meta name="description" content="{{ $episode->description }} laraveller." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $serie->title }} | {{ $episode->name }} | Laraveller" />
        <meta property="og:description" content="{{ $episode->description }} laraveller." />
        <meta property="og:url" content="{{ route('series.show', $serie->slug) }}" />
        <meta property="og:locale" content="en" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="{{ $serie->title }} | {{ $episode->name }} | Laraveller" />
        <meta name="twitter:description" content="{{ $episode->description }} laraveller." />
        <link href="https://laraveller.com/" rel="home" />
        <link href="{{ route('episodes.show', [$serie->slug, $episode->id]) }}" rel="canonical" />
        <meta property="og:image" content="{{ asset($serie->featured_image) }}">
    </x-slot>
    <section class="max-w-7xl mx-auto m-2 p-2 bg-yellow-400 rounded-lg">
        <div class="w-full">
            <div class="aspect-w-16 aspect-h-9">
                <iframe class="lozad blur"
                        data-src="{{ $episode->embed_url }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto min-h-screen m-2 p-2 bg-gray-100">
        <div class="w-full m-2 p-2">
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              @if($serie->episodes)
              @foreach ($serie->episodes as $ep)
                  <li class="group-link-underline">
                  <a href="{{ route('episodes.show', [$serie->slug, $ep->id]) }}">
                     <x-front.episode-list>
                        @if($ep->id == $episode->id)
                         <x-slot name="index">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                          </svg>
                         </x-slot>
                         @else
                         <x-slot name="index">{{ $loop->iteration }}</x-slot>
                         @endif
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
