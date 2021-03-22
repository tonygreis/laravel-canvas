
        <div {{ $attributes->merge(['class' => 'group max-w-sm mx-auto overflow-hidden bg-gray-50 h-full rounded-lg shadow-md']) }}>
            {{ $image }}
            <div class="px-6 py-4">
                <h1 class="text-xl title-color font-semibold group-hover:text-fuchsia-500">{{ $title }}</h1>
                <p class="py-2">
                    {{ $slot }}
                </p>
            </div>
        </div>
