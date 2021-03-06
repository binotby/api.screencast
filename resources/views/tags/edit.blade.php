<x-app-layout>
    <x-slot name="title">
        Tags
    </x-slot>

    <x-slot name="header">
        Tag: {{ $tag->title }}
    </x-slot>

    <form action="{{ route('tags.edit', $tag->slug) }}" method="post">
        @method('put')
        @include('tags._form-control', [
            'submit' => 'Save'
        ])
    </form>
    
</x-app-layout>