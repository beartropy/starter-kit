<div class="flex items-center z-30">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" wire:navigate>
        <img src="{{ asset('images/logo.svg') }}" alt="Logo"
            class="md:pt-3 will-change-transform transform-gpu origin-left
       transition-[transform,margin,width] duration-500 ease-[cubic-bezier(.4,0,.2,1)]"
            :class="sidebarOpen ? 'ml-3 w-14' : 'ml-1 w-9'" />
    </a>

    <!-- Caption (contenedor colapsable) -->
    <div class="hidden md:block overflow-hidden ml-1 mt-3
           transition-[max-width] duration-500 ease-[cubic-bezier(.2,.8,.2,1)]
           motion-reduce:transition-none"
        :class="sidebarOpen ? 'max-w-[12rem]' : 'max-w-0'" aria-hidden="false">
        <a wire:navigate href="{{ route('dashboard') }}"
            class="block font-logo font-bold tracking-[0.2rem]
              text-gray-700 dark:text-gray-400 will-change-transform transform-gpu origin-left
              transition-[opacity,transform] duration-500 ease-[cubic-bezier(.2,.8,.2,1)]
              motion-reduce:transition-none text-xl"
            :class="sidebarOpen ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-2'">
            Beartropy
        </a>
    </div>
</div>
