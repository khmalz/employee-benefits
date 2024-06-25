<nav class="fixed z-20 w-full border-b border-gray-200 bg-white sm:ps-64">
    <div class="flex flex-wrap items-center justify-between p-4 sm:justify-end">
        <button
            class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden"
            data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" type="button"
            aria-controls="separator-sidebar">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
        <button class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 md:me-0"
            id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" type="button"
            aria-expanded="false">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full"
                src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 my-4 hidden w-40 list-none divide-y divide-gray-100 rounded-lg bg-gray-100 text-base shadow-lg"
            id="user-dropdown">
            <div class="px-4 py-3">
                <span class="block text-sm text-gray-900">Selamat Datang</span>
                <span class="block truncate text-sm text-gray-800">{{ auth()->user()->name }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <form class="inline-block w-full" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" href="#"
                            onclick="return confirm('Apakah Yakin?') ? this.parentElement.submit() : null">Sign out</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
