@csrf

<!-- episode -->
<div class="mb-6">
    <x-label for="episode" :value="__('title')" />
    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $video->title" autofocus required />
    @error('title')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Video ID -->
<div class="mb-6">
    <x-label for="unique_video_id" :value="__('Video ID')" />
    <x-input id="unique_video_id" class="block mt-1 w-full" type="text" name="unique_video_id" :value="old('unique_video_id') ?? $video->unique_video_id" required />
    @error('unique_video_id')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Episode -->
<div class="mb-6">
    <x-label for="episode" :value="__('episode')" />
    <x-input id="episode" class="block mt-1 w-full" type="text" name="episode" :value="old('episode') ?? $video->episode" required />
    @error('episode')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Runtime -->
<div class="mb-6">
    <x-label for="runtime" :value="__('Runtime')" />
    <x-input id="runtime" class="block mt-1 w-full" type="text" name="runtime" :value="old('runtime') ?? $video->runtime" required />
    @error('runtime')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Intro -->
<div class="mb-6">
    <x-label for="intro" :value="__('Introduction?')" />
    <x-input id="intro" class="block mt-1" type="checkbox" name="intro" :value="old('intro') ?? $video->intro" />
    @error('intro')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>


<x-button>{{ $submit }}</x-button>