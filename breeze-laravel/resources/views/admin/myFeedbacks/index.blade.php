@extends('templates.main')

@section('content')
    <div>
        @if (session('success'))
            <div id="flash-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center">My Feedbacks</h1>

        <a href="{{ route('my-feedbacks.create') }}" class="btn btn-primary m-3">Create Feedback</a>

        @foreach ($myFeedbacks as $feedback)
            <div class="card mb-3">
                <h2 class="card-header">{{ $feedback->sender_name }}</h2>
                <div class="card-body">
                    <h4 class="card-title">{{ $feedback->sender_email }}</h4>
                    <p class="card-text">{{ $feedback->short_message }}</p>
                    <p class="card-text">Rating: {{ $feedback->rating }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('my-feedbacks.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('my-feedbacks.destroy', $feedback->id) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }, 3000);
    </script>
@endsection
