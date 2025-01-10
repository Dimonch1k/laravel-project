<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-100 text-gray-800 leading-tight"> {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Admin Stats Card --}}
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-semibold dark:text-gray-100 text-gray-900">Total Products</div>
                        <div class="text-2xl font-bold dark:text-gray-100 text-gray-900">{{ $totalProducts }}</div>
                    </div>
                </div>

                {{-- Admin Stats Card --}}
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-semibold dark:text-gray-100 text-gray-900">Total Categories</div>
                        <div class="text-2xl font-bold dark:text-gray-100 text-gray-900">{{ $totalCategories }}</div>
                    </div>
                </div>

                {{-- Admin Stats Card --}}
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-semibold dark:text-gray-100 text-gray-900">Total Users</div>
                        <div class="text-2xl font-bold dark:text-gray-100 text-gray-900">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-semibold dark:text-gray-100 text-gray-800 mb-4">
                            {{ __('Recent Products') }}</h3>

                        {{-- Product Table --}}
                        <x-products.product-table :products="$products" />

                        {{-- Pagination --}}
                        <div class="mt-4">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
