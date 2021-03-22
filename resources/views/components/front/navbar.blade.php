<!-- component -->
<div class="bg-gray-900">
    <div class="container mx-auto">
      <nav x-data="{ open: false }" class="px-6 py-2 shadow-md md:flex">
        <div class="flex justify-between items-center">
            <div class="text-2xl text-cyan-500 font-bold hover:text-cyan-800 p-1 mr-2">
                <a class="flex" href="/">
                    <img class="w-12 h-12 rounded-full lozad blur" data-src="{{ asset('img/logo.png') }}">
                    <span class="flex items-center mx-1">Laraveller</span>
                </a>
            </div>
            <div class="md:hidden">
                 <button class="rounded-lg text-fuchsia-500 md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div :class="{'block': open, 'hidden': !open}" class="w-full pb-2 md:flex md:items-center md:justify-between md:pb-0 p-2">
            <div class="flex flex-col px-2 md:flex-row">
                    <x-front-nav-link href="{{ route('blog.index') }}">
                        Blog
                    </x-front-nav-link>
                    <x-front-nav-link href="{{ route('series.index') }}">
                        Series
                    </x-front-nav-link>
                @foreach (Canvas\Models\Topic::all() as $topic)
                   <x-front-nav-link href="{{ route('topics.show', $topic->slug) }}">
                        {{ $topic->name }}
                    </x-front-nav-link>
              @endforeach
            </div>
            <div class=" flex item-center">
                <form method="GET" action="{{ route('search.index') }}">
                <input type="search"
                       name="query"
                       class="w-full px-4 py-3 mx-4 leading-tight text-sm text-fuchsia-400 ring-1 ring-fuchsia-500 bg-gray-900 rounded placeholder-fuchsia-700 focus:outline-none focus:shadow-outline"
                        placeholder="search">
                </form>
            </div>
        </div>
      </nav>
    </div>
</div>
