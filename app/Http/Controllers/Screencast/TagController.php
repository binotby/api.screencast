<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Screencast\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    
    public function index()
    {
        //
    }

    public function table()
    {
        return view('tags.table', [
            'tags' => Tag::withCount('playlists')->latest()->paginate(16),
        ]);
    }

    public function create()
    {
        return view('tags.create', [
            'tag' => new Tag()
        ]); 
    }


    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect(route('tags.table'));
    }

    public function destroy(Tag $tag)
    {
        $tag->playlists()->detach();
        $tag->delete();

        return redirect(route('tags.table'));
    }
}
