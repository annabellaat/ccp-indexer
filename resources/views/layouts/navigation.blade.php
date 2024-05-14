<nav class="w-full bg-red-900 sticky top-0 z-50">
  <div class="flex h-16 mx-auto">
    <div class="flex-none self-center mr-10">
      <a href="{{ route('home') }}" class="flex">
        <img alt="CCP Logo" class="mr-3 ml-12 h-14 w-full" src="{{ asset('img/ccp-nav-logo.png') }}">
        <!-- <span class="text-white text-3xl pt-1">
            CCP DIGITAL ARCHIVES
        </span> -->
      </a>
    </div>
    <div class="relative flex-auto">
      <div class="absolute top-3 right-0 items-center md:hidden">
        <button type="button" class="mr-1 sm:mr-3 relative inline-flex items-center justify-center rounded-md p-1.5 text-gray-400 border-slate-300 hover:bg-slate-400/50" id="navbar-dropdown">
          <span class="absolute -inset-0.5 navhide"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>  
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="mr-2 hidden md:grid md:grid-rows-1 gap-4 justify-end h-full">
        <ul class="flex pt-4">
          <!-- <li class="flex-auto">
            <a href="{{Route::is('home') ? '#search' : url('/search')}}" class="text-white hover:outline hover:outline-amber-700 hover:outline-1 hover:outline-offset-1 hover:bg-red-800 block rounded-md px-2 py-1 text-xl tracking-wide mr-2" aria-current="page">FEATURED</a>
          </li> -->
          <li class="flex-auto">
            <a href="{{ route('browse') }}" class="text-white hover:outline hover:outline-amber-700 hover:outline-1 hover:outline-offset-1 hover:bg-red-800 block rounded-md px-2 py-1 text-xl tracking-wide mr-2" aria-current="page">BROWSE</a>
          </li>
          <li class="flex-auto">
            <a href="{{ Route::is('home') ? '#' : route('browse') }}" class="text-white hover:outline hover:outline-amber-700 hover:outline-1 hover:outline-offset-1 hover:bg-red-800 block rounded-md px-2 py-1 text-xl tracking-wide mr-2 text-nowrap" aria-current="page">OPEN ACCESS</a>
          </li>
          <li class="flex-auto">
            <svg viewBox="0 0 24 24" fill="white" class="w-9 h-9 mr-4">
              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>

          </li>
        </ul>
      </div>


      <div class="sssss absolute mt-16 right-0 z-10 shadow-2xl ring-1 ring-black ring-opacity-5 rounded-lg bg-red-900 hidden md:hidden" id="navbar-collapse">
        <!-- <a href="{{Route::is('home') ? '#search' : url('/search')}}" class="navhide text-white ring-black ring-opacity-10 ring-1 hover:outline hover:outline-amber-800 hover:outline-1 hover:bg-red-800 block rounded-md px-16 py-3 text-xl tracking-widest" aria-current="page">FEATURED</a> -->
        <a href="{{ route('browse') }}" class="navhide text-white ring-black ring-opacity-10 ring-1 hover:outline hover:outline-amber-800 hover:outline-1 hover:bg-red-800 block rounded-md px-16 py-3 text-xl tracking-widest" aria-current="page">BROWSE</a>
        <a href="{{ Route::is('home') ? '#' : route('browse') }}" class="navhide text-white ring-black ring-opacity-10 ring-1 hover:outline hover:outline-amber-800 hover:outline-1 hover:bg-red-800 block rounded-md px-16 py-3 text-xl tracking-widest text-nowrap" aria-current="page">OPEN ACCESS</a>
      </div>

    </div>
  </div>


</nav>
