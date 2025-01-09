@props(['action', 'method' => 'POST', 'category' => null])

<form action="{{ $action }}" method="post" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method($method)

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('name', $category->name ?? '') }}" required>
        @error('name')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <div class="relative">
            <input type="file" id="image" name="image"
                class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">Upload a JPEG, PNG, JPG, GIF, BMP, SVG or WEBP file.</p>
        </div>
        @error('image')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit"
        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        {{ $category ? 'Update Category' : 'Create Category' }}
    </button>
</form>
