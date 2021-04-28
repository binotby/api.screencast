<x-app-layout>
    <x-slot name="title">
        Create new playlist
    </x-slot>

    <x-slot name="header">
        Create new playlist
    </x-slot>

    <div class="w-full lg:w-1/2">
        <img class="rounded-lg w-full mb-6" src="{{ $playlist->picture }}" alt="{{ $playlist->name }}">
    </div>

    <form action="{{ route('playlists.edit', $playlist->slug) }}" method="post" enctype="multipart/form-data">
        @method('put')

        @include('playlists._form-control', [
            'submit' => 'Update',
        ])
    </form>
</x-app-layout>