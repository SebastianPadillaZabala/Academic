<div class="flex space-x-4 pt-2 pr-2">
<div class="group inline-block ml-auto">
    <button
        class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
    >
        <span class="pr-1 font-semibold flex-1">Acciones</span>
        <span>
      <svg
          class="fill-current h-4 w-4 transform group-hover:-rotate-180
        transition duration-150 ease-in-out"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
      >
        <path
            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
      </svg>
    </span>
    </button>
    <ul
        class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-400 ease-in-out origin-top min-w-32">
        @yield('dropdown')
    </ul>
</div>
</div>
<style>
    li>ul                 { transform: translatex(100%) scale(0) }
    li:hover>ul           { transform: translatex(101%) scale(1) }
    li > button svg       { transform: rotate(-90deg) }
    li:hover > button svg { transform: rotate(-270deg) }
    .group:hover .group-hover\:scale-100 { transform: scale(1) }
    .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
    .scale-0 { transform: scale(0) }
    .min-w-32 { min-width: 8rem }
</style>
