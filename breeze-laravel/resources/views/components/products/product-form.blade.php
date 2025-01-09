@props(['action', 'method' => 'POST', 'product' => null, 'categories'])

<form action="{{ $action }}" method="post" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method($method)

    {{-- Name --}}
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('name', $product->name ?? '') }}" required>
        @error('name')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    {{-- Price --}}
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" id="price" name="price"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ old('price', $product->price ?? '') }}" required>
        @error('price')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    {{-- Category --}}
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
        <select id="category_id" name="category_id"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" id="image" name="image"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @error('image')
            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>

    {{-- Submit button --}}
    <button type="submit"
        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        {{ $product ? 'Update Product' : 'Create Product' }}
    </button>
</form>
