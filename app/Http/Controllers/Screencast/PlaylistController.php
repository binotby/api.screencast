<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create', [
            'playlist' => new Playlist(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(PlaylistRequest $request)
    {
        $playlist = Auth::user()->playlists()->create([
           'name' => $request->name,
           'thumbnail' => $request->file('thumbnail')->store('images/playlist'),
           'slug' => Str::slug($request->name . '-' . Str::random(6)),
           'description' => $request->description,
           'price' => $request->price,
        ]);

        $playlist->tags()->sync(request('tags'));

       return back();
    }

    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', [
            'playlist' => $playlist,
            'tags' => Tag::get(),
        ]);
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        if ($request->thumbnail) {
            Storage::delete($playlist->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('images/playlist');
        } else {
            $thumbnail = $playlist->thumbnail;
        }
        
        $playlist->update([
            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $playlist->tags()->sync(request('tags'));
 
        return redirect(route('playlists.table'));
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(16);
        return view('playlists.table', compact('playlists'));
    }

    public function destroy(Playlist $playlist)
    {
        Storage::delete($playlist->thumbnail);
        $playlist->tags()->detach();
        $playlist->delete();

        return redirect(route('playlists.table'));
    }
}
