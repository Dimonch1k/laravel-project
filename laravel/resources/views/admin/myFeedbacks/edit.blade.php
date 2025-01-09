@extends('templates.main')

@section('content')
    <h1>Edit Feedback</h1>

    <form action="{{ route('my-feedbacks.update', $feedback) }}" method="post">
        @method('PUT')
        @csrf
        {{-- Edit Name --}}
        <div class="mb-3">
            <label for="sender_name">Name:</label>
            <input type="text" name="sender_name" value="{{ old('sender_name') ?? $feedback->sender_name }}"
                class="form-control @error('sender_name') is-invalid @enderror">
            @error('sender_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Edit Email --}}
        <div class="mb-3">
            <label for="sender_email">Email:</label>
            <input type="email" name="sender_email" value="{{ old('sender_email') ?? $feedback->sender_email }}"
                class="form-control @error('sender_email') is-invalid @enderror">
            @error('sender_email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Edit Message --}}
        <div class="mb-3">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') ?? $feedback->message }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Edit Rating --}}
        <div class="mb-3">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" value="{{ old('rating') ?? $feedback->rating }}"
                class="form-control @error('rating') is-invalid @enderror" min="1" max="5">
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
