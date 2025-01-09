@extends('templates.main')

@section('content')
    <h1>Send Feedback</h1>

    <form action="{{ route('my-feedbacks.store') }}" method="post">
        @csrf
        {{-- Sender Name --}}
        <div class="mb-3">
            <label for="sender_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="sender_name" name="sender_name" value="{{ old('sender_name') }}"
                required>
        </div>

        {{-- Sender Email --}}
        <div class="mb-3">
            <label for="sender_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="sender_email" name="sender_email"
                value="{{ old('sender_email') }}" required>
        </div>

        {{-- Message --}}
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
        </div>

        {{-- Rating --}}
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select class="form-select" id="rating" name="rating" required>
                <option value="" selected>Select rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                        {{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
