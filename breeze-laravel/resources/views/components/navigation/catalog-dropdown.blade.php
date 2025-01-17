<div class="hidden sm:flex sm:items-center sm:ms-6 relative">
    <x-dropdown align="left" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md dark:text-gray-200 text-gray-500 dark:bg-slate-700 bg-white dark:hover:text-gray-100 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div>{{ __('Catalog') }}</div>
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="relative">
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($shared_categories as $shared_category)
                        <x-dropdown-link :href="route('products.filter', ['category' => $shared_category->slug])">
                            {{ $shared_category->name }}
                        </x-dropdown-link>
                    @endforeach
                </div>
            </div>
        </x-slot>
    </x-dropdown>
</div>
