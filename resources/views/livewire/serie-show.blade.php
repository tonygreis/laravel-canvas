<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="w-full m-2 p-2 text-gray-100">{{ $serie->title }}</div>
      <div class="w-full flex justify-between m-2 p-2">
          <input type="search" wire:model.debounce.500ms="search" class="bg-gray-100 dark:bg-gray-600 dark:text-gray-200 ring-2 hover:ring-green-500 rounded-lg" placeholder="Search">
          <x-jet-button wire:click="showModal" class="bg-green-600 hover:bg-green-800">Create</x-jet-button>
      </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">is Published</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Embed Code</th>
            <th scope="col" class="relative px-6 py-3">Edit</th>
          </tr>
        </thead>
        <tbody class="bg-gray-50 divide-y divide-gray-200">
          @if ($episodes)    
          @foreach ($episodes as $episode)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">{{ $episode->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $episode->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                  @if ($episode->is_published)
                      <span class="text-green-500 font-semibold">Published</span>
                  @else
                      <span class="text-red-500 font-semibold">Unpublished</span>
                  @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $episode->embed_url }}
              </td>
              <td class="px-6 py-4 text-right text-sm">
                  <x-jet-button wire:click="showEditModal({{ $episode->id }})" class="bg-green-500 hover:bg-green-700">Edit</x-jet-button>
                  <x-jet-button wire:click="destroyEpisode({{ $episode->id }})" class="bg-red-500">Delete</x-jet-button>
              </td>
            </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <x-jet-dialog-modal wire:model="showCreateModal">
      <x-slot name="title">@if($episodeId) Edit @else Create @endif Episode</x-slot>
      <x-slot name="content">
          <div class="m-4 p-4 bg-gray-200 dark:bg-gray-800">
            <form enctype="multipart/form-data">
                <div class="sm:col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-100"> Episode name </label>
                <div class="mt-1">
                    <input type="text" id="name" wire:model.lazy="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white dark:bg-gray-600 dark:text-gray-50 border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="sm:col-span-6">
                <label for="embedUrl" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Embed Url </label>
           
                <div class="mt-1">
                    <input type="text" id="embedUrl" wire:model="embedUrl" name="embedUrl" class="block w-full transition duration-150 ease-in-out appearance-none bg-white dark:bg-gray-600 dark:text-gray-50 border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                    @error('embedUrl') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-6 pt-5">
                <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Description</label>
                <div class="mt-1">
                    <textarea id="body" rows="3" wire:model.lazy="description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white dark:bg-gray-600 dark:text-gray-50 border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>

                  <div class="sm:col-span-6 pt-5">
                    <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="isPublished" name="isPublished" wire:model="isPublished" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="isPublished" class="font-medium text-gray-700 dark:text-gray-200">Published</label>
                  </div>
                </div>
                </div>
            </form>
            </div>
      </x-slot>
      <x-slot name="footer">
          @if($episodeId)
          <x-jet-button wire:click="updateEpisode">Update</x-jet-button>
          @else
          <x-jet-button wire:click="storeEpisode">Store</x-jet-button>
          @endif
      </x-slot>
  </x-jet-dialog-modal>
</div>
