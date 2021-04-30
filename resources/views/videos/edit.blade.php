<x-app-layout>
    <x-slot name="title">
        Videos
    </x-slot>

    <x-slot name="header">
        Video: {{ $video->title }}
    </x-slot>

    <form action="{{ route('videos.edit', $video->slug) }}" method="post">
        @method('put')
        @include('videos._form-control', [
            'submit' => 'Save'
        ])
    </form>
    
</x-app-layout>