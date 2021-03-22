<x-show-post>
    <x-slot name="head">
        <title>{{ $post->meta['title'] }} | Laraveller</title>
        <meta name="description" content="{{ $post->meta['description'] }} laraveller." />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $post->meta['title'] }} | Laraveller" />
        <meta property="og:description" content="{{ $post->meta['description'] }} laraveller." />
        <meta property="og:url" content="{{ $post->meta['canonical_link'] }}" />
        <meta property="og:locale" content="en" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@laravellercom" />
        <meta name="twitter:title" content="{{ $post->meta['title'] }} | Laraveller" />
        <meta name="twitter:description" content="{{ $post->meta['description'] }} laraveller." />
        <link href="https://laraveller.com/" rel="home" />
        <link href="{{ route('posts.show', $post->slug) }}" rel="canonical" />
        <meta property="og:image" content="{{ asset($post->featured_image) }}">
    </x-slot>
   <div class="container mx-auto flex flex-wrap p-2 bg-gray-100 rounded-xl">
        <!-- Post Section -->
        <section class="w-full md:w-4/6 px-1">
            <article class="w-full shadow bg-gray-50 rounded-xl">
                <!-- Article Image -->
                <div class="flex justify-center rounded-lg">
                    <img class="m-2 p-2 rounded-xl lazy transition duration-300 ease-in-out lozad blur"
                         data-src="{{ $post->featured_image }}">
                </div>
                <div class="flex justify-between font-sans m-2 px-4 py-2 font-sans bg-yellow-400">
                    <div class="flex flex-wrap justify-center bg-yellow-300 rounded m-1 md:p-1">
                        <span class="md:pr-2">Topic</span>
                        <a href="#" class="font-semibold title-color hover:text-fuchsia-500">{{ $post->topic[0]['name'] ?? ''}}</a>
                    </div>
                    <div class="flex flex-wrap justify-center bg-yellow-300 rounded m-1 md:p-1">
                        <span class="md:pr-2">By</span>
                        <a href="#" class="font-semibold title-color hover:text-fuchsia-500">{{ $post->user->name }}</a>
                    </div>
                    <div class="flex flex-wrap justify-center bg-yellow-300 rounded m-1 md:p-1">
                        <span class="md:pr-2">Published</span>
                        <span class="font-semibold title-color hover:text-fuchsia-500">{{ $post->published_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="text-4xl title-color font-bold font-serif pb-4">{{ $post->title }}</div>
                </div>
               <div class="flex justify-center">
                   <div id="content" class="w-full p-6 sm:prose prose-sm prose">
                       {!! $post->body !!}
                   </div>
               </div>
                @if($post->tags->count() > 0)
                    <div class="flex justify-between font-sans m-2 px-4 py-2 font-sans bg-yellow-400">
                        @foreach ($post->tags as $tag)
                            <div class="flex flex-wrap justify-center bg-yellow-300 rounded m-1 p-1">
                                <a href="{{ route('tags.show', $tag->slug) }}" class="font-semibold title-color hover:text-fuchsia-500">{{ $tag->name }}</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </article>
            <div class="flex m-2 p-2">
                @if (isset($previous))
                <a href="{{ route('posts.show', $previous->slug)}}" class="w-1/2 bg-gray-50 flex hover:bg-purple-200 shadow hover:shadow-md text-left p-4 rounded-lg">
                    <img class="hidden md:block md:w-32 rounded-r-none rounded-lg lozad blur"
                         data-src="{{ $previous->featured_image }}">
                    <p class="w-full pt-2 bg-gray-50 hover:text-fuchsia-500 p-4 rounded-l-none rounded-lg">{{ $previous->title}}</p>
                </a>
                @endif
                @if (isset($next))
                 <a href="{{ route('posts.show', $next->slug)}}" class="w-1/2 bg-gray-50 flex hover:bg-purple-200 shadow hover:shadow-md text-left p-4 rounded-lg">
                    <p class="w-full pt-2 bg-gray-50 hover:text-fuchsia-500 p-4 rounded-r-none rounded-lg">{{ $next->title}}</p>
                    <img class="hidden md:block md:w-32 rounded-l-none rounded-lg lozad blur"
                         data-src="{{ $next->featured_image }}">
                </a>
              @endif
            </div>

        </section>
        <section class="w-full md:w-2/6 px-1">
            <div class="bg-gray-100 rounded p-2">
            <div class="border-l-4 border-red-400 p-2 flex items-center justify-between my-4">
                <div class="font-semibold text-gray-800">Latest Posts</div>
                <div class="text-red-400">See all</div>
                 </div>
                 @foreach ($latest as $l)
                      <hr class="py-2"/>
                      <a class="group" href="{{ route('posts.show', $l->slug) }}">
                        <div class="flex items-center justify-between my-4 group-hover:bg-gray-200 p-1 transition duration-300 ease-in-out rounded-xl">
                            <div class="w-16">
                            <img class="w-12 h-12 rounded-full lozad blur"
                                 data-src="{{ $l->featured_image }}">
                            </div>
                            <div class="flex-1 pl-2">
                                <div class="text-gray-700 group-hover:text-fuchsia-500 font-semibold">
                                   {{ $l->title }}
                                </div>
                            </div>
                        </div>
                      </a>
                 @endforeach
            </div>
        </section>
   </div>
</x-show-post>
