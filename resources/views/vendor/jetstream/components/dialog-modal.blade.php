@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 bg-white dark:bg-gray-800 dark:text-gray-50">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 dark:bg-gray-900 dark:text-gray-50 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
