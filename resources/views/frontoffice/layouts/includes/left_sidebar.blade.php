<div class="w-full md:w-3/12 md:mx-2">
    <!-- Profile Card -->
    <div class="bg-white p-3 border-t-4 border-indigo-400">
        @yield('profile_data')
        <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            @yield('navbar')
        </ul>
    </div>
    <!-- End of profile_alumno card -->
    <div class="my-4"></div>
    <!-- Friends card -->
    <div class="bg-white p-3 hover:shadow">
        <div>
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                <span class="tracking-wide">Suscripcion</span>
            </div>
            <ul class="list-inside space-y-2">
                @yield('suscripcion')
            </ul>
        </div>
    </div>
    <!-- End of friends card -->
</div>
