<form action="{{ route('products.destroy', $product->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="inline-block p-2 text-base font-semibold text-white transition duration-150 ease-in-out dark:bg-orange-700 bg-orange-600 border border-transparent rounded-md dark:hover:bg-orange-600 hover:bg-orange-500 focus:outline-none focus:border-orange-700 focus:shadow-outline-green active:bg-orange-700">Delete</button>
</form>
