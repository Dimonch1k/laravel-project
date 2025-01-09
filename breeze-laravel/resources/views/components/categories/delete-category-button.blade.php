<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="inline-block p-2 text-base font-semibold text-white transition duration-150 ease-in-out bg-orange-600 border border-transparent rounded-md hover:bg-orange-500 focus:outline-none focus:border-orange-700 focus:shadow-outline-green active:bg-orange-700">Delete</button>
</form>
