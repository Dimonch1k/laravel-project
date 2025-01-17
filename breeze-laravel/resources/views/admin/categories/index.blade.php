<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-100 text-gray-800 leading-tight"> {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-700 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 gap-4">
                    <!-- Create Category Button -->
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <x-categories.create-category-button />
                    @endif

                    <!-- Category Table -->
                    <x-categories.category-table :categories="$categories" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
