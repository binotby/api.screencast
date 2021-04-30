<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create(Playlist $playlist)
    {
        return view('videos.create', [
            'playlist' => $playlist,
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist, Request $request)
    {
        $attr = request()->validate([
            'title' => 'required',
            'episode' => 'required',
            'runtime' => 'required',
            'unique_video_id' => 'required',
        ]);

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;
        $playlist->videos()->create($attr);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
