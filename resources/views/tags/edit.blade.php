<x-app-layout>
    <x-slot name="title">
        Tags
    </x-slot>

    <x-slot name="header">
        Create a new Tag
    </x-slot>

    <form action="{{ route('tags.edit', $tag->slug) }}" method="post">
        @method('put')
        @include('tags._form-control', [
            'submit' => 'Save'
        ])
    </form>
    
</x-app-layout>