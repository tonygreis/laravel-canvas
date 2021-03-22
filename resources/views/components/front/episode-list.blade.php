<div class="w-full">
<div class="h-full flex items-center hover:bg-yellow-300 border-gray-200 border p-4 rounded-lg">
<div class="w-16 h-16 bg-yellow-200 flex justify-center rounded-full mr-4">
    <span class="place-self-center text-2xl font-semibold text-blue-800">{{ $index }}</span>
</div>
<div class="flex-grow">
       {{ $slot }}
</div>
</div>
</div>
