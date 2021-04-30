<x-app-layout>
    <x-slot name="title">
        Tags
    </x-slot>

    <x-slot name="header">
        List of all Tag
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Playlist</x-th>
                @can('delete tags')
                    <x-th>Action</x-th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <x-td>{{ $loop->iteration }}</x-td>
                <x-td>{{ $tag->name }}</x-td>
                <x-td>{{ $tag->playlists_count }}</x-td>
                @can('delete tags')
                <x-td>
                    <a href="{{ route('tags.edit', $tag->slug) }}">Edit</a>
                        <div x-data="{ modalIsOpen: false }">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure?">
                                <div class="flex">
                                    <form action="{{ route('tags.delete', $tag->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500" type="submit">Yes</button>
                                    </form>
                                    <button class="ml-4" @click="modalIsOpen = false">No</button>
                                </div>
                            </x-modal>
                            <button @click="modalIsOpen = true">Delete</button>
                        </div>
                </x-td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </x-table>

    {{ $tags->links() }}
    
</x-app-layout>