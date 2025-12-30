<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @BeartropyAssets
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased h-screen overflow-hidden bg-app-shell text-slate-900 dark:text-slate-100">

    <div x-data="{
        isDesktop: window.innerWidth >= 768,
        sidebarOpen: window.innerWidth >= 768
    }" @resize.window="isDesktop = window.innerWidth >= 768" class="flex h-full">

        <template x-if="isDesktop">
            <div class="contents">
                @include('components.sidebar')
            </div>
        </template>

        <template x-if="!isDesktop">
            <div class="contents">
                @include('components.bottom-bar')
            </div>
        </template>

        @include('components.header')

        <main
            :class="isDesktop ?
                'flex flex-col flex-grow bg-app-shell text-base text-gray-600 dark:text-gray-300 p-2 mt-10 overflow-hidden' :
                'flex-1 overflow-y-auto pt-10 overscroll-contain scroll-area text-gray-600 dark:text-gray-300 beartropy-thin-scrollbar pb-12 bg-app-content'">
            <div class="flex flex-col flex-1 h-full bg-app-content rounded-xl p-3">
                <!-- Encabezado -->
                @if (isset($title))
                    <div
                        class="pb-3 mb-3 border-b border-gray-300 dark:border-gray-700 flex items-center justify-between">
                        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200 p-2">
                            {{ $title }}
                        </h1>


                        @if (isset($actions))
                            <div class="flex items-center space-x-2">
                                {{ $actions }}
                            </div>
                        @endif
                    </div>
                @endif
                <!-- Contenido scrolleable -->
                <div class="flex-1 overflow-y-auto beartropy-thin-scrollbar p-1 px-3">
                    {{-- <div class="max-w-7xl mx-auto"> --}}
                    {{ $slot }}
                    {{-- </div> --}}
                </div>
            </div>
        </main>

    </div>
    <x-bt-toast />
    <x-bt-dialog />
    @livewireScripts
</body>

</html>
