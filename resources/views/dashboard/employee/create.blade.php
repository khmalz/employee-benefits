@extends('dashboard.layouts.main')

@section('content')
    <div>
        <h1 class="mb-3 text-xl font-semibold">Tambah Karyawan</h1>
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-2">
                <div class="w-full rounded-lg bg-white p-5">
                    <h2 class="mb-3 text-xl font-semibold">Akun</h2>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="name">Nama</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="name" name="name" type="text" value="{{ old('name') }}" placeholder="nama"
                            required>
                        @error('name')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="email">Email</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="email" name="email" type="email" value="{{ old('email') }}" placeholder="email"
                            required>
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
                </div>
                <div class="w-full rounded-lg bg-white p-5">
                    <h2 class="mb-3 text-xl font-semibold">Informasi</h2>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="nik">NIK</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="nik" name="nik" type="text" value="{{ old('nik') }}" placeholder="nik"
                            required oninput="validateSingleSentence(this)">
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
                            <option selected disabled>Pilih status</option>
                            <option value="kontrak" @selected(old('status') == 'kontrak')>Kontrak</option>
                            <option value="permanen" @selected(old('status') == 'permanen')>Permanen</option>
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
                                id="inp-started_at" name="tanggal_masuk" data-date="{{ old('tanggal_masuk') }}"
                                type="text" value="{{ old('tanggal_masuk') }}" autocomplete="off"
                                datepicker-autoselect-today datepicker-buttons datepicker datepicker-autohide
                                placeholder="Pilih Tanggal">
                        </div>
                        @error('tanggal_masuk')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full rounded-lg bg-white p-5">
                    <h2 class="mb-3 text-xl font-semibold">Tunjangan</h2>

                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="kesehatan">Tunjangan
                            Kesehatan</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="kesehatan" name="kesehatan" type="text" value="{{ old('kesehatan') }}"
                            placeholder="1.000.000" required>
                        @error('kesehatan')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="bencana">Tunjangan
                            Bencana</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="bencana" name="bencana" type="text" value="{{ old('bencana') }}"
                            placeholder="1.000.000" required>
                        @error('bencana')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="transportasi">Tunjangan
                            Transportasi</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="transportasi" name="transportasi" type="text" value="{{ old('transportasi') }}"
                            placeholder="1.000.000" required>
                        @error('transportasi')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="jabatan">Tunjangan
                            Jabatan</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="jabatan" name="jabatan" type="text" value="{{ old('jabatan') }}"
                            placeholder="1.000.000" required>
                        @error('jabatan')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium text-gray-900" for="makanan">Tunjangan
                            Makanan</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500"
                            id="makanan" name="makanan" type="text" value="{{ old('makanan') }}"
                            placeholder="1.000.000" required>
                        @error('makanan')
                            <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300"
                        type="submit">Tambah Karyawan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"
        integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" type="module"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(["#kesehatan", "#bencana", "#transportasi", "#jabatan", "#makanan"]).maskMoney({
                thousands: '.',
                decimal: ',',
                precision: 0,
                allowZero: true,
                allowNegative: false,
            });

            const defaultDate = $('#inp-started_at').data('date');
            const parsedDate = defaultDate ? new Date(defaultDate) : null;
            new Datepicker(document.getElementById('inp-started_at'), {
                language: "id",
                weekStart: 1,
                autohide: true,
                clearBtn: true,
                todayBtn: true,
                todayBtnMode: 1,
                format: "dd-mm-yyyy",
            });

            if (parsedDate) {
                datepicker.setDate(parsedDate);
            }
        });

        function validateSingleSentence(input) {
            input.value = input.value.replace(/\s+/g, '');
        }

        function togglePasswordVisibility(inputId, checkbox) {
            const inputElement = document.getElementById(inputId);
            if (checkbox.checked) {
                inputElement.type = 'text';
            } else {
                inputElement.type = 'password';
            }
        }
    </script>
@endpush
