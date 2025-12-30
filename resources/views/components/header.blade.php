{{-- Mobile Header --}}
<template x-if="!isDesktop">
    <header
        class="fixed top-0 left-0 right-0 z-50
            bg-app-shell/80 backdrop-blur-md
            border-b border-gray-100 dark:border-gray-800
            px-2 md:px-4 py-2 md:py-1
            flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center justify-start">
            <a href="{{ route('dashboard') }}" wire:navigate class="cursor-pointer flex items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-7 h-7" />
            </a>
        </div>

        <!-- Center: Text -->
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
            <span class="text-gray-600 dark:text-gray-400 font-logo tracking-[0.2rem] font-bold text-lg">Beartropy</span>
        </div>

        <!-- Right: Avatar -->
        <div class="flex items-center justify-end">
            <a class="flex items-center space-x-2" href="{{ route('dashboard') }}">
                <x-bt-avatar src="{{ session('thumbnailphoto') }}" custom-size="w-7 h-7 text-xs" />
            </a>
        </div>
    </header>
</template>

{{-- Desktop Header --}}
<template x-if="isDesktop">
    <header class="fixed top-0 left-0 right-0 p-1 bg-app-shell">
        <div class="flex justify-end items-center space-x-3  mr-4 h-10">
            <a href="https://beartropy.com" target="_blank" class="flex items-center gap-2">
                <x-bt-icon name="arrow-top-right-on-square" class="w-5 h-5" />
                <span>Go to documentation</span>
            </a>
            <x-bt-toggle-theme size="lg" />
            <x-bt-dropdown placement="right" color="beartropy" :withnavigate="true">
                <x-slot:trigger>
                    <div class="cursor-pointer">
                        <x-bt-avatar src="{{ session('thumbnailphoto') }}" custom-size="w-8 h-8 text-xs mt-1" />
                    </div>
                </x-slot:trigger>

                <x-bt-dropdown.header>General</x-bt-dropdown.header>
                <x-bt-dropdown.item as="a" :href="route('dashboard')" icon="home">Dashboard</x-bt-dropdown.item>

                <x-bt-dropdown.separator />
                <x-bt-dropdown.header>Sesión</x-bt-dropdown.header>

                <x-bt-dropdown.item color="red" as="button">
                    <a href="{{ route('logout') }}">
                        <div class="flex text-red-500 hover:text-red-300 w-full h-full cursor-pointer">
                            <x-bt-icon name="arrow-left-on-rectangle" class="w-5 h-5 mr-2" />
                            <span>Cerrar sesión</span>
                        </div>
                    </a>
                </x-bt-dropdown.item>
            </x-bt-dropdown>
        </div>
    </header>
</template>
