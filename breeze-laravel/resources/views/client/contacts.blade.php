@extends('templates.main')

@section('content')
    <h1>Contacts Page</h1>

    <form action="{{ route('send-message') }}" method="post">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
