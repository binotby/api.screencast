<x-app-layout>
    <x-slot name="title">
        Create new playlist
    </x-slot>

    <form action="{{ route('playlists.create') }}" method="post" enctype="multipart/form-data">
        @include('playlists._form-control', [
            'submit' => 'Create',
        ])
    </form>
</x-app-layout>