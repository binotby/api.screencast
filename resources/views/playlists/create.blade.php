<x-app-layout>
    <x-slot name="title">
        Create new playlist
    </x-slot>

    <form action="{{ route('playlists.create') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Thumbnail -->
        <div class="mb-6">
            <x-label for="thumbnail" :value="__('Thumbnail')" />
            <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required />
        </div>

        <!-- Name -->
        <div class="mb-6">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
        </div>

        <!-- Price -->
        <div class="mb-6">
            <x-label for="price" :value="__('Price')" />
            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
        </div>

        <!-- Description -->
        <div class="mb-6">
            <x-label for="description" :value="__('Description')" />
            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required >{{ old('description') }}</x-textarea>
        </div>

        <x-button>Create</x-button>
    </form>
</x-app-layout>