<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-white dark:bg-gray-800 shadow-md">
            <div class="p-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold">Admin Panel</h2>
                <button @click="darkMode = !darkMode"
                    class="rounded-md p-2 bg-gray-200 dark:bg-gray-700 focus:outline-none" x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
                    @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'; document.documentElement.classList.toggle('dark', darkMode);">
                    <svg x-show="darkMode" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v3m6.364 1.636l-2.121 2.121M21 12h-3m-1.636 6.364l-2.121-2.121M12 21v-3m-6.364-1.636l2.121-2.121M3 12h3m1.636-6.364l2.121 2.121" />
                    </svg>
                    <svg x-show="!darkMode" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3.172a9 9 0 100 17.656 9 9 0 000-17.656zM12 3v2m0 14v2m4.95-14.95l-1.414 1.414m-7.072 0l-1.414-1.414m12.728 6.364H17m-10 0H7m7.071 7.071l1.414-1.414m-7.072 0l1.414 1.414" />
                    </svg>
                </button>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Products</a>
                <a href="{{ route('admin.categories.index') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Categories</a>
                <a href="{{ route('logout') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
