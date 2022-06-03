<aside>
    <nav class="flex flex-col bg-indigo-600 w-64 h-full px-12 pt-0 pb-6">
        <div>
            <div class="-mx-6 px-6 py-4">
                <a href="{{route('home')}}" title="home" class="font-bold text-white text-2xl">
                    ACADEMIC
                </a>
            </div>
<<<<<<< HEAD
            <div class="mt-8 text-center">
=======
            <div class="mt-0 text-center">
                
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                    @yield('name')
            </div>
            <ul class="space-y-2 tracking-wide mt-5">
            <li>
                @if(auth()->user()->tipo == 'Administrador')
                    <a href="{{route('CursosAdmin')}}" class="relative px-4 py-2 flex items-center space-x-4 rounded-xl text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Cursos</span>
                    </a>
<<<<<<< HEAD
                @endif
               @if(auth()->user()->tipo != 'Admin')
=======
                @endif    
               @if(auth()->user()->tipo != 'Administrador') 
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                <a href="{{route('profesor.cursos')}}" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Mis Cursos</span>
                </a>
                @endif
            </li>
            <li>
<<<<<<< HEAD
                @if(auth()->user()->tipo == 'Administrador')
                    <a href="{{route('Allcategoriastable')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
=======
            @if(auth()->user()->tipo == 'Administrador')
                    <a href="{{route('Allcategoriastable')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Categorias</span>
                    </a>
<<<<<<< HEAD
                    <a href="{{route('backoffice.user.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
=======
                   <a href="{{route('backoffice.user.index')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Usuarios</span>
                    </a>
                @endif
<<<<<<< HEAD

                @if(auth()->user()->tipo != 'Administrador')
=======
                @if(auth()->user()->tipo != 'Administrador') 
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                <a href="{{route('categorias')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">Categorias</span>
                    </a>

                    @endif
            </li>
           @if(auth()->user()->tipo != 'Profesor')
           <li>
                <a href="{{route('Allalumnos')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Alumnos</span>
                </a>
            </li>
            <li>
                <a href="{{route('Allprofesores')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="group-hover:text-gray-700">Profesores</span>
                </a>
            </li>
            <li>
                <a href="{{route('Tplanes')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Planes</span>
                </a>
            </li>
            <li>
                <a href="{{route('reporte')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Reportes</span>
                </a>
            </li>
<<<<<<< HEAD
                    <li>
                        <a href="{{route('backoffice.role.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
=======
            <li>
                        <a href="{{route('backoffice.role.index')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Roles</span>
                        </a>
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="{{route('backoffice.permission.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
=======
                        <a href="{{route('backoffice.permission.index')}}" class="px-4 py-2 flex items-center space-x-4 rounded-md text-white group">
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Permisos</span>
                        </a>
                    </li>
<<<<<<< HEAD

=======
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
            @endif
        </ul>
        </div>
        <div class="px-6 -mx-6 pt-2 mt-5 flex justify-between items-center border-t">
            <form method="POST" action="{{route ('logout')}}">
                @csrf
                <a href="{{Route('logout')}}">
                    <button class="px-4 py-2 flex items-center bg-gray-600 space-x-4 rounded-md font-black text-white group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="group-hover:text-gray-700">Logout</span>
                    </button>
                </a>
            </form>
        </div>
    </nav>
</aside>

