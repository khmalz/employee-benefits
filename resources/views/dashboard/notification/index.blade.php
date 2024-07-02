@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full text-end">
            <button
                class="rounded-lg bg-blue-500 px-4 py-1.5 text-center text-xs font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">Read
                All</button>
        </div>

        <h1 class="mb-3 text-xl font-semibold">This Week</h1>
        <div class="mb-3 flex flex-col space-y-3">
            <div class="flex w-full items-center justify-between rounded-lg bg-white p-5">
                <div class="flex items-center space-x-4">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-red-300/80">
                        <svg class="h-5 w-5 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p>Permintaan tunjangan transportasi anda telah <span class="text-red-800">ditolak</span></p>
                        <p class="mt-0.5 text-xs text-gray-500">5 hours ago</p>
                    </div>
                </div>
                <div>
                    <button class="text-sm text-blue-500 hover:underline">Read</button>
                </div>
            </div>
            <div class="flex w-full items-center space-x-4 rounded-lg bg-white p-5">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-yellow-300/80">
                    <svg class="h-5 w-5 text-yellow-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <p>Permintaan tunjangan bencana anda sedang <span class="text-yellow-800">diproses</span></p>
            </div>
            <div class="flex w-full items-center space-x-4 rounded-lg bg-white p-5">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-green-300/80">
                    <svg class="h-5 w-5 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <p>Permintaan tunjangan kesehatan anda telah <span class="text-green-800">selesai</span></p>
            </div>
        </div>
        <h1 class="mb-3 text-xl font-semibold">This Month</h1>
        <div class="mb-3 flex flex-col space-y-3">
            <div class="w-full rounded-lg bg-white p-5">
            </div>
            <div class="w-full rounded-lg bg-white p-5">
            </div>
            <div class="w-full rounded-lg bg-white p-5">
            </div>
            <div class="w-full rounded-lg bg-white p-5">
            </div>
        </div>
    </div>
@endsection
