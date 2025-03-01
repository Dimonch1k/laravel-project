<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-100 text-gray-800 leading-tight"> {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-700 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-categories.category-form :category="$category" action="{{ route('categories.update', $category) }}"
                        method="PUT" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
