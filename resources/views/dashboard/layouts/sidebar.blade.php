<aside class="fixed left-0 top-0 z-40 h-screen w-52 -translate-x-full transition-transform sm:w-64 sm:translate-x-0"
    id="separator-sidebar" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-gray-50 px-3 py-4">
        <h2 class="mb-3 text-center text-2xl font-semibold text-gray-900"><a href="{{ route('home') }}">Employee
                Benefits</a>
        </h2>
        <ul class="space-y-2 px-1 font-medium">
            {{-- <li>
                <a class="{{ request()->routeIs('training.*') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Pelatihan</span>
                </a>
            </li> --}}
            <li>
                <a class="{{ request()->routeIs('employee.*') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('employee.index') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Karyawan</span>
                </a>
            </li>
            <li>
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
            </li>
            <li>
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
            </li>
        </ul>
    </div>
</aside>
