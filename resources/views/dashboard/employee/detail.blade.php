@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4 flex w-full justify-between">
        <h1 class="text-xl font-bold">Detail Karyawan</h1>
    </div>

    <div class="flex w-full space-x-2">
        <div class="w-1/3 rounded-lg bg-white p-5">
            <div class="flex h-full flex-col justify-between">
                <div class="flex flex-col items-center">
                    <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src="{{ asset('images/Anon Bussines.png') }}"
                        alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $employee->user->name }}</h5>
                    <span class="text-sm text-gray-500">{{ $employee->user->email }}</span>
                    <span class="mt-2 text-sm font-medium text-gray-700">Status: <span
                            class="capitalize">{{ $employee->status }}</span></span>
                </div>
                <div class="text-center">
                    <a class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                        href="#">Riwayat
                        Tunjangan</a>
                </div>
            </div>
        </div>
        <div class="w-2/3 rounded-lg bg-white p-5">
            <div class="w-full">
                <ul class="w-full rounded-lg border-none bg-white text-sm font-medium text-gray-900">
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">NIK</span>
                            <span class="font-normal">{{ $employee->nik }}</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg py-2">
                        <div class="flex justify-between">
                            <span class="">Tanggal Masuk</span>
                            <span class="font-normal">{{ $employee->tanggal_masuk->format('d F Y') }}</span>
                        </div>
                    </li>
                    <hr class="my-2 border-gray-400/80" />
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Tunjangan Kesehatan</span>
                            <span class="font-normal">Rp. {{ number_format($employee->kesehatan, 0, '', '.') }}</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Tunjangan Pernikahan</span>
                            <span class="font-normal">Rp. {{ number_format($employee->pernikahan, 0, '', '.') }}</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Tunjangan Bencana</span>
                            <span class="font-normal">Rp. {{ number_format($employee->bencana, 0, '', '.') }}</span>
                        </div>
                    </li>
                    <li class="w-full rounded-t-lg border-b border-gray-200 py-2">
                        <div class="flex justify-between">
                            <span class="">Tunjangan Kematian</span>
                            <span class="font-normal">Rp. {{ number_format($employee->kematian, 0, '', '.') }}</span>
                        </div>
                    </li>
                </ul>
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
