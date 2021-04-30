<x-app-layout>
    <x-slot name="title">
        Videos
    </x-slot>

    <x-slot name="header">
        Add a new Video
    </x-slot>

    <form action="{{ route('videos.create', $playlist->slug) }}" novalidate method="post">
        @include('videos._form-control', [
            'submit' => 'Add video'
        ])
    </form>
    
</x-app-layout>