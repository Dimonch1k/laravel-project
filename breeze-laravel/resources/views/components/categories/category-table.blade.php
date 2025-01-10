<div class="category-table">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $category)
            <div class="dark:bg-slate-600 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-semibold dark:text-gray-200 text-gray-800">{{ $category->name }}</h3>
                        <div class="dark:text-white text-gray-500 text-lg">{{ $loop->iteration }}</div>
                    </div>

                    <div class="mb-4">
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                            class="w-auto text-white max-h-12 object-cover">
                    </div>

                    <p class="dark:text-white text-gray-700 mb-4">{{ $category->short_description }}</p>

                    <div class="flex space-x-4 ">
                        <x-categories.edit-category-button :category="$category" />
                        <x-categories.delete-category-button :category="$category" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
