@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4 flex w-full justify-between">
        <h1 class="text-xl font-bold">Detail Tunjangan | <span class="text-blue-600">#B419JS86G</span></h1>
        <div class="flex space-x-2">
            <button
                class="block rounded-lg bg-sky-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring-1 focus:ring-sky-300"
                data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                Ekspor ke PDF
            </button>

            <button
                class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">Aksi <svg class="ms-2 h-2.5 w-2.5"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow" id="dropdown">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100" data-modal-target="tanggapan-modal"
                            data-modal-toggle="tanggapan-modal" href="#" role="button">Tanggapan</a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100" href="#">Edit Permintaan</a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100" href="#">Hapus Permintaan</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="flex w-full space-x-2">
        <div class="w-1/3 rounded-lg bg-white p-5">
            <div class="flex flex-col items-center">
                <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src="{{ asset('images/Anon Bussines.png') }}"
                    alt="Bonnie image" />
                <h5 class="mb-1 text-xl font-medium text-gray-900">Ahas</h5>
                <span class="text-sm text-gray-500">ahas@gmail.com | Visual Designer</span>
                <span class="mt-2 text-sm font-medium text-gray-700">RTS20210701</span>
            </div>
        </div>
        <div class="w-2/3">
            <div class="w-full rounded-lg bg-white p-5">
                <h2 class="text-lg font-medium">Detail Tunjangan</h2>
                <ul class="w-full rounded-lg border-none bg-white text-sm font-medium text-gray-900">
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Jenis Tunjangan</span>
                            <span class="font-normal">Kesehatan</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Status</span>
                            <span class="font-normal text-purple-800">Belum</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Tanggal</span>
                            <span class="font-normal">20 September 2023</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Besar Tunjangan</span>
                            <span class="font-normal">Rp. 1.000.000</span>
                        </div>
                    </li>
                    <li class="w-full rounded-b-lg py-2">
                        <div class="flex flex-col">
                            <span>Pesan</span>
                            <span class="font-normal">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam,
                                et?</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-2 flex w-full pe-2">
        <div class="w-1/3 flex-col">

            <div class="w-full rounded-lg bg-white p-5">
                <h2 class="text-lg font-medium">File Pendukung</h2>

                <div class="mt-2 max-w-sm rounded-lg border-none bg-white">
                    <a class="image-lightbox duration-700 ease-in-out" data-width="800px" data-height="500px"
                        href="https://picsum.photos/id/1/800/500">
                        <img class="rounded-t-lg" src="https://picsum.photos/id/1/800/500" alt="" />
                    </a>
                    <p class="mb-3 mt-1.5 font-normal text-gray-700">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>

            </div>
        </div>
    </div>

    <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        id="popup-modal" tabindex="-1">
        <div class="relative max-h-full w-full max-w-md p-4">
            <div class="relative rounded-lg bg-white py-2 shadow">
                <button
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                    data-modal-hide="popup-modal" type="button">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Ekspor Data?</h3>
                    <button
                        class="inline-flex items-center rounded-lg bg-sky-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-sky-300"
                        data-modal-hide="popup-modal" type="button">
                        Ya
                    </button>
                    <button
                        class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100"
                        data-modal-hide="popup-modal" type="button">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        id="tanggapan-modal" aria-hidden="true" tabindex="-1">
        <div class="relative max-h-full w-full max-w-xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tanggapan
                    </h3>
                    <button
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                        data-modal-hide="tanggapan-modal" type="button">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-4 p-4 md:p-5">
                    <form class="w-full">
                        <div class="mb-5">
                            <label class="mb-2 block text-sm font-medium text-gray-900" for="status">Status</label>
                            <select
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                id="status">
                                <option selected>Pilih status</option>
                                <option value="tolak">Menolak</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="mb-2 block text-sm font-medium text-gray-900" for="teacher">Pesan</label>
                            <textarea
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                id="pesan" rows="2" placeholder="Tulis pesan">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end rounded-b border-t border-gray-200 p-4 md:p-5">
                    <button
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                        type="button">Kirim Tanggapan</button>

                </div>
            </div>
        </div>
    </div>
@endSection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const portfolioLightbox = GLightbox({
                selector: '.image-lightbox'
            });
        });
    </script>
@endpush
