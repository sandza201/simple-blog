<nav class="border-b border-gray-100 flex-col hidden sm:flex min-w-64">
    <div>
        <h1
            class="flex flex-row gap-4 h-16 items-center bg-white px-6 font-bold text-lg ring-1 ring-gray-950/5 shadow-sm">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

            Laravel
        </h1>
    </div>

    <div class="flex flex-col gap-y-7 px-6 py-8 text-gray-700">
        <div class="flex flex-col gap-y-2 w-full">
            <x-nav-link :href="route('home')">
                Home
            </x-nav-link>

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-nav-link>

            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')">
                Posts
            </x-nav-link>
        </div>
    </div>
</nav>
