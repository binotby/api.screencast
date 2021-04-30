<x-app-layout>
    <x-slot name="title">
        Playlists
    </x-slot>

    <x-slot name="header">
        List of all playlist
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Published</x-th>
                <x-th>Action</x-th>

            </tr>
        </thead>
        <tbody>
            @foreach($playlists as $playlist)
            <tr>
                <x-td>{{ $loop->iteration }}</x-td>
                <x-td>
                    <div>
                        <a href="{{ route('videos.table', $playlist->slug) }}">
                            {{ $playlist->name }}
                        </a>
                    </div>
                    @foreach($playlist->tags as $tag)
                        <span class="mr-1 text-xs">{{ $tag->name }}</span>
                    @endforeach
                </x-td>
                <x-td>{{ $playlist->created_at->format("d F, Y") }}</x-td>
                <x-td>
                    <a href="{{ route('videos.create', $playlist->slug) }}">Add video</a>
                    <a href="{{ route('playlists.edit', $playlist->slug) }}">Edit</a>
                    <div x-data="{ modalIsOpen: false }">
                        <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure?">
                            <div class="flex">
                                <form action="{{ route('playlists.delete', $playlist->slug) }}" method="post">
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
            </tr>
            @endforeach
        </tbody>
    </x-table>

    {{ $playlists->links() }}
</x-app-layout>