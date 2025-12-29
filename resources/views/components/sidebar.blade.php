<aside
    class="h-full overflow-y-auto overflow-x-hidden flex-shrink-0 flex flex-col transition-all duration-300 bg-light dark:bg-gray-900 z-30"
    :class="{
        'w-10 md:w-10': !sidebarOpen,
        'w-60 md:w-60': sidebarOpen,
    }">

    @persist('logo')
        @include('components.logo')
    @endpersist


    @include('components.menu')

</aside>

<!-- Hamburger Button for Mobile -->
<button @click="sidebarOpen = !sidebarOpen"
    class="absolute top-3 right-3 z-40 text-gray-600 hover:text-blue-600 md:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>
