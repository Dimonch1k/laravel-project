<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-100 text-gray-800 leading-tight"> {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach (['update-profile-information-form', 'update-password-form', 'delete-user-form'] as $component)
                <div class="p-4 sm:p-8 dark:bg-slate-700 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include("profile.partials.{$component}")
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
