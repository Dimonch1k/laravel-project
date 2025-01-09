<div class="product-table">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 flex justify-evenly sm:grid sm:justify-normal">
                    <div class="mb-4 flex justify-center">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                            class="w-auto max-h-28 object-cover">
                    </div>


                    <div class="grid mb-4">
                        <h5 class="text-2xl mb-4 font-semibold text-gray-800">{{ $product->name }}</h5>

                        <p class="text-lg mb-4 text-red-700">
                            {{ $product->price }}$
                        </p>

                        <div class="flex items-center">
                            <img src="{{ asset(optional($product->category)->image) }}" alt="{{ $product->name }}"
                                class="w-auto h-6 mr-2 object-cover">
                            <p class="text-lg text-gray-700">
                                {{ optional($product->category)->name }}
                            </p>
                        </div>
                    </div>

                    <div class="grid sm:flex sm:space-x-4 ">
                        <x-products.edit-product-button :product="$product" />
                        <x-products.delete-product-button :product="$product" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
