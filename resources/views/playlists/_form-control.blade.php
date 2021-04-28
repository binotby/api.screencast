@csrf

<!-- Thumbnail -->
<div class="mb-6">
    <x-label for="thumbnail" :value="__('Thumbnail')" />
    <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" />
    @error('thumbnail')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Name -->
<div class="mb-6">
    <x-label for="name" :value="__('Name')" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $playlist->name" required />
    @error('name')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Price -->
<div class="mb-6">
    <x-label for="price" :value="__('Price')" />
    <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price') ?? $playlist->price" required />
    @error('price')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Description -->
<div class="mb-6">
    <x-label for="description" :value="__('Description')" />
    <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required>{{ old('description') ?? $playlist->description }}</x-textarea>
    @error('description')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Tags -->
<div class="mb-6">
    <x-label for="tags" :value="__('Tags')" />
    <select multiple name="tags[]" id="tags" class="mt-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}" {{ $playlist->tags()->find($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

<x-button>{{ $submit }}</x-button>