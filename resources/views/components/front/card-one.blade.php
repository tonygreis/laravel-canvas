<div {{ $attributes->merge(['class' => 'group max-w-sm rounded overflow-hidden shadow-lg']) }}>
    {{ $image }}
    <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2 group-hover:text-indigo-600">{{ $title}}</div>
    <p class="text-gray-700 dark:text-gray-200 text-base">
       {{ $slot }}
    </p>
    </div>
    <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
    </div>
</div>