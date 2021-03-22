<x-front-layout>
    <x-slot name="head">
        <title>Blog Posts</title>
    </x-slot>
    <x-slot name="header">
        <div class="p-4 flex justify-center">
            <h2 class="text-4xl font-serif font-semibold text-cyan-700">There are <span class="text-fuchsia-500">{{ $searchResults->count() }}</span> results</h2>
        </div>
    </x-slot>
    <section class="max-w-7xl mx-auto min-h-screen m-2 p-2 bg-gray-100 rounded-xl">
    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            <section class="m-2 md:mt-4 p-2 bg-blueGray-100 rounded-xl">
                    <h2 class="mb-2 px-6 py-1 text-xl font-serif font-bold titlo-color hover:text-fuchsia-600 transition duration-300 ease-in-out rounded-full">
                        {{ $type }}
                    </h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                    @foreach ($modelSearchResults as $searchResult)
                        <li class="group">
                            <a class="" href="{{ $searchResult->url }}">
                                <x-front.card-two  class="mb-4 bg-gray-100 text-gray-700 transition duration-500 ease-in-out">
                                    <x-slot name="image">
                                        <img
                                            class="object-cover object-center w-full h-44 opacity-90 group-hover:opacity-100 lozad blur"
                                            data-src="{{ $searchResult->searchable->featured_image }}">

                                    </x-slot>
                                    <x-slot name="title">
                                        <span class="link link-underline link-underline-white">{{ $searchResult->title }}</span>
                                    </x-slot>
                                </x-front.card-two>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
            @endforeach
    </section>
</x-front-layout>
