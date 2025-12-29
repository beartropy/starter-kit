<!-- Bottom Nav (mobile only) -->
<nav x-data="{}" data-bottom-bar
    class="md:hidden fixed bottom-0 inset-x-0 z-[60]
            bg-white/90 dark:bg-gray-900/90 backdrop-blur
            border-t border-gray-200/70 dark:border-gray-800/70
            supports-[padding:max(0px,env(safe-area-inset-bottom))]">
    <div class="grid grid-cols-5 h-full py-1">

        <a wire:navigate href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center space-y-1 {{ request()->routeIs('requests.*') || request()->routeIs('requests') ? 'text-emerald-600 dark:text-emerald-400' : 'text-gray-500 dark:text-gray-400' }}">
            <x-bt-icon name="ticket" class="w-6 h-6" />
            <span class="text-[10px] font-medium leading-none">Solicitudes</span>
        </a>

        <a wire:navigate href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center space-y-1 {{ request()->routeIs('tasks.pending') ? 'text-red-600 dark:text-red-400' : 'text-gray-500 dark:text-gray-400' }}">
            <x-bt-icon name="list-bullet" class="w-6 h-6" />
            <span class="text-[10px] font-medium leading-none">Tareas</span>
        </a>

        <a wire:navigate href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center space-y-1 {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
            <x-bt-icon name="home" class="w-6 h-6 pt-0.5" />
            <span class="text-[10px] font-medium leading-none">Inicio</span>
        </a>

        <a wire:navigate href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center space-y-1 {{ request()->routeIs('reports.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">
            <x-bt-icon name="document-chart-bar" class="w-6 h-6" />
            <span class="text-[10px] font-medium leading-none">Reportes</span>
        </a>

        <!-- Más -->
        <button type="button" @click="document.body.classList.add('overflow-hidden'); $dispatch('open-more-menu')"
            class="flex flex-col items-center justify-center space-y-1 text-gray-500 dark:text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M6 12h.01M12 12h.01M18 12h.01" />
            </svg>
            <span class="text-[10px] font-medium leading-none">Más</span>
        </button>
    </div>
</nav>

<!-- Sheet “Más” (mobile only) -->
<div x-data="{ open: false }" x-on:open-more-menu.window="open = true" x-cloak x-show="open"
    class="md:hidden fixed inset-0 z-[70]" style="display:none">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40" @click="open=false; document.body.classList.remove('overflow-hidden')">
    </div>

    <div x-trap.noscroll="open"
        class="absolute inset-x-0 bottom-0 rounded-t-2xl bg-white dark:bg-gray-900
              border-t border-gray-200 dark:border-gray-800 p-4 pt-2
              max-h-[78dvh] overflow-y-auto shadow-2xl">
        <div class="w-10 h-1 rounded-full mx-auto mb-3 bg-gray-400/60 dark:bg-gray-500/40"></div>

        <div class="relative flex items-center justify-between mb-1">
            <!-- Izquierda -->
            <div class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Más opciones
            </div>

            <!-- Centro (absolutamente centrado) -->
            <div class="absolute left-1/2 -translate-x-1/2">
                <x-bt-toggle-theme>
                    <x-slot name="icon-dark">
                        <x-bt-icon name="light-bulb" class="w-2 h-2 text-amber-400" />
                    </x-slot>
                    <x-slot name="icon-light">
                        <x-bt-icon name="light-bulb" class="w-2 h-2 text-indigo-400" />
                    </x-slot>
                </x-bt-toggle-theme>
            </div>

            <!-- Derecha -->
            <button class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-white/5"
                @click="open=false; document.body.classList.remove('overflow-hidden')">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>



        {{-- Lista compacta --}}
        <div class="">
            {{-- <div class="grid grid-cols-2 gap-1.5">
        <x-bt-button soft emerald label="Crear solicitud" icon-start="ticket" sm href="{{ route('requests') }}" class="w-full" @click="open=false; document.body.classList.remove('overflow-hidden');$dispatch('show-global-spinner')" wire:navigate />
        <x-bt-button soft red label="Tareas pendientes" icon-start="list-bullet" sm href="{{ route('tasks.pending') }}" class="w-full" @click="open=false; document.body.classList.remove('overflow-hidden');$dispatch('show-global-spinner')" wire:navigate />
      </div> --}}

            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

            <div class="grid grid-cols-2 gap-1.5 mt-1">
                <x-bt-button outline gray label="Dashboard" icon-start="ticket" sm href="{{ route('dashboard') }}"
                    class="w-full" @click="open=false; document.body.classList.remove('overflow-hidden')" />
                <x-bt-button outline gray label="Tareas" icon-start="list-bullet" sm href="{{ route('dashboard') }}"
                    class="w-full" @click="open=false; document.body.classList.remove('overflow-hidden')" />

                <x-bt-button outline gray label="Accesos" icon-start="users" sm href="{{ route('dashboard') }}"
                    class="w-full" @click="open=false; document.body.classList.remove('overflow-hidden')" />

                <x-bt-button outline gray label="Reportes" icon-start="document-chart-bar" sm
                    href="{{ route('dashboard') }}" class="w-full"
                    @click="open=false; document.body.classList.remove('overflow-hidden')" />

                <div class="col-span-2">
                    <x-bt-button outline gray label="Administracion" icon-start="adjustments-horizontal" sm
                        href="{{ route('dashboard') }}" class="w-full"
                        @click="open=false; document.body.classList.remove('overflow-hidden')" />
                </div>
            </div>
            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

            <div class="grid grid-cols-2 gap-1.5">
                <x-bt-button wire:navigate outline label="Preferencias" icon-start="cog-6-tooth" sm
                    href="{{ route('dashboard') }}" class="w-full"
                    @click="open=false; document.body.classList.remove('overflow-hidden');$dispatch('show-global-spinner')" />
                <x-bt-button outline red label="Cerrar sesión" icon-start="arrow-left-start-on-rectangle" sm
                    class="w-full" @click="$refs.logoutFormBottom.submit()" />
                <form method="POST" action="{{ route('dashboard') }}" x-ref="logoutFormBottom" class="hidden">
                    @csrf</form>
            </div>
        </div>
    </div>
</div>
