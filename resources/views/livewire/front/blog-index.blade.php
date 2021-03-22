<section class="min-h-screen mt-4 bg-gray-100 p-2 rounded-md">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
             <x-front.card-two  class="mb-4 text-purple-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-200 transition duration-300 ease-in-out hover:shadow-lg">
                <x-slot name="image">
                    <a href="{{ route('posts.show', $post->slug)}}">
                    <img class="object-cover object-center w-full h-44 group-hover:opacity-75" src="{{ asset($post->featured_image) }}">
                    </a>
                </x-slot>
                <x-slot name="title">
                    <a href="{{ route('posts.show', $post->slug)}}">{{ $post->title }}</a></x-slot>
                  @foreach ($post->tags as $tag)
                      <a href="" class="font-bold text-cyan-400 hover:text-cyan-600">#{{ $tag->name}}</a>
                  @endforeach
            </x-front.card-two>
        @endforeach
    </div>
    <div class="m-2 p-2">
        {{ $posts->links() }}
    </div>
</section>
