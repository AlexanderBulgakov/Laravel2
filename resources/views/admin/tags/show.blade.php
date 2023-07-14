<x-app-layout>
    <x-slot:title>
        {{ __('Show tag') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('tags.edit', $tag->slug)">{{ __('Edit tag') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('tag-{{ $tag->id }}').submit();" class="ml-3">
            {{ __('Delete Tag') }}
        </x-danger-button>
    </div>

    <div class="px-4">
        <h1 class="block text-3xl font-bold my-4">{{ $tag->title }}</h1>
        <div class="mb-4 text-sm bg-gray-500 text-white p-2">{{ $tag->slug }}</div>
    </div>

    <form id="tag-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->slug) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
