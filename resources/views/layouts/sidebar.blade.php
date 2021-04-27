<div class="w-1/5 bg-gray-800 min-h-screen p-5">
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Main
        </header>
        <a href="#" class="block text-gray-200 px-2 py-2">Dashboard</a>
    </div>
    @if(Auth::user()->can('create playlists'))
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Playlist
        </header>
        <a href="#" class="block text-gray-200 px-2 py-2">Create</a>
        <a href="#" class="block text-gray-200 px-2 py-2">Table</a>
    </div>
    @endif
    @if(Auth::user()->can('create tags'))
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Tags
            </header>
            <a href="#" class="block text-gray-200 px-2 py-2">Create</a>
            <a href="#" class="block text-gray-200 px-2 py-2">Table</a>
        </div>
    @endif

    @can('show users')
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Users
            </header>
            <a href="#" class="block text-gray-200 px-2 py-2">Create</a>
            <a href="#" class="block text-gray-200 px-2 py-2">Table</a>
        </div>
    @endcan

    <div class="mb-8">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" class="block text-gray-200 px-2 py-2" onclick="event.preventDefault();this.closest('form').submit();">
                {{ __('Log out') }}
            </a>
        </form>
    </div>
</div>