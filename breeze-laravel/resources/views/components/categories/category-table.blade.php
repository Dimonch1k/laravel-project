<div class="category-table">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($shared_categories as $shared_category)
            <div class="dark:bg-slate-600 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-semibold dark:text-gray-200 text-gray-800">{{ $shared_category->name }}
                        </h3>
                        <div class="dark:text-white text-gray-500 text-lg">{{ $loop->iteration }}</div>
                    </div>

                    <div class="mb-4">
                        <img src="{{ asset($shared_category->image) }}" alt="{{ $shared_category->name }}"
                            class="w-auto text-white max-h-12 object-cover">
                    </div>

                    <p class="dark:text-white text-gray-700 mb-4">{{ $shared_category->short_description }}</p>

                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <div class="flex space-x-4 ">
                            <x-categories.edit-category-button :category="$shared_category" />
                            <x-categories.delete-category-button :category="$shared_category" />
                        </div>
                    @else
                        <x-nav-link :href="route('products.filter', ['category' => $shared_category->slug])">
                            {{ __('More') }}
                        </x-nav-link>
                        {{-- <x-nav-link :href="route('products.filter', [$shared_category])" :active="request()->routeIs('products.filter')">
                            {{ __('More') }}
                        </x-nav-link> --}}
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
