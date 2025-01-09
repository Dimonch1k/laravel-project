<div class="container mx-auto p-4">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 p-4 rounded-b">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
