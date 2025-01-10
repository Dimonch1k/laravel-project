<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 dark:text-gray-300" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="dark:text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-200" type="email"
                name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 dark:text-gray-300" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="dark:text-gray-300" />

            <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-200" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 dark:text-gray-300" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center dark:text-gray-300">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 dark:border-gray-500 bg-white dark:bg-gray-800 text-indigo-600 dark:text-gray-200 shadow-sm checked:border-indigo-600 dark:checked:border-indigo-400 checked:bg-indigo-100 dark:checked:bg-indigo-900 hover:bg-transparent"
                    name="remember">
                <span class="ms-2 text-sm dark:text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm dark:text-gray-300 dark:hover:text-gray-100 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 dark:bg-gray-900 dark:text-gray-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
