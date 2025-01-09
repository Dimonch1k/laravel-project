@extends('templates.main')

@section('content')
    @if (session('success'))
        <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center">Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary" enctype="multipart/form-data">Create Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                            style="width:auto; max-height:50px; object-fit:cover">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->short_description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
