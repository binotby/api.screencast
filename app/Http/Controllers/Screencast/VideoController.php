<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function table(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('videos.table', [
            'playlist' => $playlist,
            'videos' => $playlist->videos()->orderBy('episode')->paginate(16),
        ]);
    }

    
    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('videos.create', [
            'playlist' => $playlist,
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist, VideoRequest $request)
    {
        $this->authorize('update', $playlist);

        $attr = request()->all();

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;
        $playlist->videos()->create($attr);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Video $video)
    {
        $this->authorize('update', $video->playlist);

        return view('videos.edit', [
            'video' => $video,
        ]);
    }

    public function update(Video $video, VideoRequest $request)
    {
        $playlist = $video->playlist;
        $this->authorize('update', $playlist);
        $attr = request()->all();

        $attr['intro'] = $request->intro ? true : false;
        $video->update($attr);

        return redirect(route('videos.table', $playlist->slug));
    }

    public function destroy(Video $video)
    {
        $playlist = $video->playlist;
        $this->authorize('update', $playlist);
        $video->delete();
        return redirect(route('videos.table', $playlist->slug));
    }
}
