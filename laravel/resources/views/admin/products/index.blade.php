@extends('templates.main')

@section('content')
    <h1>Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary" enctype="multipart/form-data">Create Product</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                            style="width:auto; max-height:50px; object-fit:cover">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    {{-- <td>{{ optional($product->category)->name }}</td> --}}

                    <td>
                        @if (optional($product->category)->image)
                            <img src="{{ asset($product->category->image) }}" alt="{{ $product->category->name }}"
                                style="width:auto; max-height:50px; object-fit:cover">
                        @else
                            <img src="{{ asset('images/no-img.png') }}" alt="{{ optional($product->category)->name }}"
                                style="width:auto; max-height:50px; object-fit:cover">
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection
