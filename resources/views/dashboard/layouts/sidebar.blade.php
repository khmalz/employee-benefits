<aside class="fixed left-0 top-0 z-40 h-screen w-52 -translate-x-full transition-transform sm:w-64 sm:translate-x-0"
    id="separator-sidebar" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-gray-50 px-3 py-4">
        <h2 class="mb-3 text-center text-2xl font-semibold text-gray-900"><a href="{{ route('home') }}">Employee
                Benefits</a>
        </h2>
        <ul class="space-y-2 px-1 font-medium">
            <a class="{{ request()->routeIs('request') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                href="{{ route('request') }}">
                <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11 16.5a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0Zm4.5 2.5v-1.5H14v-2h1.5V14h2v1.5H19v2h-1.5V19h-2Z"
                        clip-rule="evenodd" />
                    <path d="M3.987 4A2 2 0 0 0 2 6v9a2 2 0 0 0 2 2h5v-2H4v-5h16V6a2 2 0 0 0-2-2H3.987Z" />
                    <path fill-rule="evenodd" d="M5 12a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ms-3">Permintaan</span>
            </a>
            <a class="{{ request()->routeIs('benefit.*') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                href="{{ route('benefit.history') }}">
                <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ms-3">Riwayat</span>
            </a>
        </ul>
    </div>
</aside>
