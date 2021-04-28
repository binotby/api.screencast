<x-app-layout>
    <x-slot name="title">
        Tags
    </x-slot>

    <x-slot name="header">
        Create a new Tag
    </x-slot>

    <form action="{{ route('tags.create') }}" method="post">
        @include('tags._form-control', [
            'submit' => 'Create'
        ])
    </form>
    
</x-app-layout>