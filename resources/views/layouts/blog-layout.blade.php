<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div>
        <nav class="w-full border-b relative">
            <div class="flex flex-row py-3 px-6 items-baseline">
                <div class="flex flex-col items-start md:flex-row gap-6 md:items-center">
                    <a href="{{ route('feed.index') }}"
                        class="text-2xl font-bold">{{ config('app.name', 'Laravel') }}</a>
                    <x-forms.form action="{{ route('feed.search') }}" method="GET">
                        <div class="flex flex-row items-center gap-2">
                            <input type="text" name="query" placeholder="Search posts"
                                value="{{ request('query') }}"
                                class="border border-gray-300 rounded-full px-3 py-2 focus:outline-none focus:ring-0">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-full">
                                Search
                            </button>
                        </div>
                    </x-forms.form>
                </div>

                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end absolute right-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </nav>

        <main>
            <div class="px-4 sm:px-0">
                {{ $slot }}
            </div>
            <div x-data="{ showToast: true }">
                @if (session()->has('message'))
                    <div x-show="showToast" x-transition class="fixed bottom-3 right-3">
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            <span class="font-medium">Success!</span> {{ session()->get('message') }}
                            <span @click="showToast = false" class="px-2 cursor-pointer">X</span>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div x-show="showToast" x-transition class="fixed bottom-3 right-3">
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 flex flex-row" role="alert">
                            <span class="font-medium">Error! </span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                            <span @click="showToast = false" class="px-2 cursor-pointer">X</span>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
    </div>

</body>

</html>
