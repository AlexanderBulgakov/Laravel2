<x-app-layout>
    <x-slot:title>
        {{ __('Show category') }}
    </x-slot>

    <div class="p-4 flex justify-between border-b">
        <x-button-link-edit :href="route('categories.edit', $category->slug)">{{ __('Edit category') }}</x-button-link-edit>
        
        <x-danger-button onclick="event.preventDefault();document.getElementById('category-{{ $category->id }}').submit();" class="ml-3">
            {{ __('Delete Category') }}
        </x-danger-button>
    </div>

    <div class="px-4">
        <h1 class="block text-3xl font-bold my-4">{{ $category->title }}</h1>
        <div class="mb-4 text-sm bg-gray-500 text-white p-2">{{ $category->slug }}</div>
    </div>

    <form id="category-{{ $category->id }}" action="{{ route('categories.destroy', $category->slug) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

</x-app-layout>
