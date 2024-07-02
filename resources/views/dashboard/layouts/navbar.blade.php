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
        <div class="flex flex-wrap items-center space-x-3 px-2 py-1">
            @role('employee')
                <button
                    class="relative inline-flex items-center text-center text-sm font-medium text-gray-500 hover:text-gray-900 focus:outline-none"
                    id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" type="button">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 14 20">
                        <path
                            d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                    </svg>
                    <div class="absolute -top-0.5 start-2.5 block h-3 w-3 rounded-full border-2 border-white bg-red-500">
                    </div>
                </button>

                <!-- Notification menu -->
                <div class="z-20 hidden w-full max-w-sm divide-y divide-gray-100 rounded-lg bg-white shadow"
                    id="dropdownNotification" aria-labelledby="dropdownNotificationButton">
                    <div class="block rounded-t-lg bg-gray-50 px-4 py-2 text-center font-medium text-gray-700">
                        Notifications
                    </div>
                    <div class="divide-y divide-gray-100">
                        <a class="flex space-x-1 px-4 py-3 hover:bg-gray-100" href="#">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-red-300/80">
                                <svg class="h-5 w-5 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="w-full ps-2">
                                <div class="mb-1.5 text-sm text-gray-500">Permintaan tunjangan transportasi anda telah <span
                                        class="text-red-800">ditolak</span></div>
                                <div class="text-xs text-blue-600">a few moments ago</div>
                            </div>
                        </a>
                    </div>
                    <a class="block rounded-b-lg bg-gray-50 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100"
                        href="#">
                        <div class="inline-flex items-center">
                            <svg class="me-2 h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
            @endrole

            <button
                class="inline-flex items-center text-center text-sm font-medium text-gray-500 hover:text-gray-900 focus:outline-none"
                id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom"
                type="button" aria-expanded="false">
                <span class="sr-only">Open user menu</span>
                <svg class="h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- User menu -->
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
