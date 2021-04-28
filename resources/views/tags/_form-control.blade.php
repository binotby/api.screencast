@csrf

<!-- Name -->
<div class="mb-6">
    <x-label for="name" :value="__('Name')" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $tag->name" required />
    @error('name')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<x-button>{{ $submit }}</x-button>