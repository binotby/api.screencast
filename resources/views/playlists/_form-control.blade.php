@csrf

<!-- Thumbnail -->
<div class="mb-6">
    <x-label for="thumbnail" :value="__('Thumbnail')" />
    <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required />
    @error('thumbnail')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Name -->
<div class="mb-6">
    <x-label for="name" :value="__('Name')" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
    @error('name')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Price -->
<div class="mb-6">
    <x-label for="price" :value="__('Price')" />
    <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
    @error('price')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Description -->
<div class="mb-6">
    <x-label for="description" :value="__('Description')" />
    <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required>{{ old('description') }}</x-textarea>
    @error('description')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<x-button>{{ $submit }}</x-button>