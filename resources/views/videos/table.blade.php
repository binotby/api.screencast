<x-app-layout>
    <x-slot name="title">
        videos
    </x-slot>

    <x-slot name="header">
        Playlist: {{ $playlist->name }}
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <x-th>#</x-th>
                <x-th>Title</x-th>
                <x-th>Intro?</x-th>
                @can('delete videos')
                    <x-th>Action</x-th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <x-td>{{ $loop->iteration }}</x-td>
                <x-td>{{ $video->title }}</x-td>
                <x-td>{{ $video->intro ? 'Yes' : 'No' }}</x-td>
                @can('delete videos')
                <x-td>
                    <a href="{{ route('videos.edit', $video->slug) }}">Edit</a>
                        <div x-data="{ modalIsOpen: false }">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure?">
                                <div class="flex">
                                    <form action="{{ route('videos.delete', $video->slug) }}" method="post">
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

    {{ $videos->links() }}
    
</x-app-layout>