@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">Tambah Karyawan</h2>

            <form action="#" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="name">Nama</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                        id="name" name="name" type="text" placeholder="nama" required>
                    @error('name')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="email">Email</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                        id="email" name="email" type="email" placeholder="email" required>
                    @error('email')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="password">Password</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                        id="password" name="password" type="password" placeholder="password" required>
                    <div class="mt-1.5 flex items-center">
                        <input
                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-green-600 focus:ring-2 focus:ring-green-500"
                            id="checkbox-password" type="checkbox" onclick="togglePasswordVisibility('password', this)">
                        <label class="ms-1 text-sm font-medium text-gray-900 selection:normal-case"
                            for="checkbox-password">Show
                            Password</label>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="nik">NIK</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                        id="nik" name="nik" type="text" placeholder="nik" required>
                    @error('nik')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="status_employee">Status
                        Karyawan</label>
                    <select
                        class="decorated block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
                        id="status_employee" name="status">
                        <option selected>Pilih status</option>
                        <option value="kontrak">Kontrak</option>
                        <option value="permanen">Permanen</option>
                    </select>

                    @error('status')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="started_at">Tanggal Mulai
                    </label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
                            id="inp-started_at" name="started_at" type="text" value="{{ old('started_at') }}"
                            autocomplete="off" datepicker-buttons datepicker datepicker-autohide
                            placeholder="Pilih Tanggal">
                    </div>

                    @error('started_at')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    class="rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300"
                    type="submit">Tambah Karyawan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Datepicker(document.getElementById('inp-started_at'), {
                language: "id",
                weekStart: 1,
                autohide: true,
                clearBtn: true,
                todayBtn: true,
                format: "dd-mm-yyyy",
            });
        });
    </script>
@endpush
