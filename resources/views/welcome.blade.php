<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beartropy Starter Kit</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @BeartropyAssets
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body
    class="font-sans antialiased bg-gray-50 dark:bg-zinc-950 text-slate-900 dark:text-slate-100 min-h-screen flex flex-col justify-center items-center relative selection:bg-rose-500 selection:text-white">

    <div class="absolute top-4 right-4 z-50">
        <x-bt-toggle-theme />
    </div>

    <main class="w-full max-w-md px-6">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold tracking-tight mb-2">Beartropy</h1>
            <p class="text-slate-600 dark:text-slate-400 text-lg">Starter Kit for Laravel</p>
        </div>

        <x-bt-card
            class="backdrop-blur-xl bg-white/80 dark:bg-zinc-900/80 border-slate-200 dark:border-zinc-800 shadow-xl ring-1 ring-slate-900/5">
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold">Welcome back</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Please enter your details to sign in.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <x-bt-input label="Email address" type="email" name="email" value="{{ old('email') }}"
                            required autofocus placeholder="name@example.com" class="w-full" />
                    </div>

                    <div>
                        <x-bt-input label="Password" type="password" name="password" required placeholder="••••••••"
                            class="w-full" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="rounded border-slate-300 dark:border-zinc-700 text-rose-500 shadow-sm focus:ring-rose-500 dark:bg-zinc-800 dark:checked:bg-rose-500">
                            <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-rose-600 hover:text-rose-500 dark:text-rose-400 dark:hover:text-rose-300"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <x-bt-button
                            class="w-full justify-center bg-rose-600 hover:bg-rose-500 text-white border-transparent"
                            type="submit">
                            Log in
                        </x-bt-button>
                    </div>
                </form>

                <div class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                        class="font-medium text-rose-600 hover:text-rose-500 dark:text-rose-400 dark:hover:text-rose-300">
                        Sign up
                    </a>
                </div>
            </div>
        </x-bt-card>

        <footer class="mt-8 text-center text-sm text-slate-500 dark:text-slate-500">
            <p>&copy; {{ date('Y') }} Beartropy UI. All rights reserved.</p>
        </footer>
    </main>
    @livewireScripts
</body>

</html>
