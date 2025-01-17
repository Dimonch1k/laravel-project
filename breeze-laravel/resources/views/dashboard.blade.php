<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-100 text-gray-800 leading-tight">
            {{ __('Welcome, ') . auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Personal Info --}}
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold dark:text-gray-100 text-gray-900 mb-2">{{ __('Your Profile') }}</h3>
                <ul class="text-gray-600 dark:text-gray-300">
                    <li><strong>{{ __('Name: ') }}</strong> {{ auth()->user()->name }}</li>
                    <li><strong>{{ __('Email: ') }}</strong> {{ auth()->user()->email }}</li>
                    <li><strong>{{ __('Joined: ') }}</strong> {{ auth()->user()->created_at->format('M d, Y') }}</li>
                </ul>
            </div>

            {{-- Settings --}}
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">
                    {{ __('Update Your Profile Settings') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
