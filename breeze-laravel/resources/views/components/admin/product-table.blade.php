<div>
    <table class="min-w-full table-auto dark:bg-gray-800 dark:text-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Name') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Price') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Category') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-t border-gray-300">
                    <td class="px-4 py-2">{{ $product->id }}</td>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">{{ $product->price }}</td>
                    <td class="px-4 py-2">{{ $product->category->name }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="text-blue-600 hover:text-blue-800">
                            {{ __('Edit') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
