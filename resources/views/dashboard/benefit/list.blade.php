@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="mb-4 flex w-full items-center justify-between">
            <button
                class="ms-2 inline-flex items-center rounded-full border border-blue-700 bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                data-modal-target="search-modal" data-modal-toggle="search-modal" type="button">
                <svg class="me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg> Pencarian
            </button>

            <a class="ms-2 inline-flex items-center rounded-lg border border-cyan-500 bg-cyan-500 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-600 focus:outline-none focus:ring-4 focus:ring-cyan-300"
                href="{{ route('benefit.done') }}" role="button">
                Tunjangan Selesai
            </a>

            <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
                id="search-modal" aria-hidden="true" tabindex="-1">
                <div class="relative max-h-full w-full max-w-xl p-4">
                    <!-- Modal content -->
                    <div class="relative rounded-lg bg-white shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Cari
                            </h3>
                            <button
                                class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                                data-modal-hide="search-modal" type="button">
                                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="space-y-4 p-4 md:p-5">
                            <form class="w-full">
                                <div class="mb-2">
                                    <label class="mb-2 block text-sm font-medium text-gray-900" for="cari">Nama</label>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        id="cari" name="cari" type="text" placeholder="nama" required>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2 block text-sm font-medium text-gray-900" for="tanggal">Tanggal
                                    </label>
                                    <div class="relative">
                                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                            <svg class="h-4 w-4 text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"
                                            id="inp-tanggal" name="tanggal" type="text" value="{{ old('tanggal') }}"
                                            autocomplete="off" datepicker-buttons datepicker datepicker-autohide
                                            placeholder="Pilih Tanggal">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="mb-2 block text-sm font-medium text-gray-900" for="status">Jenis
                                        Tunjangan</label>
                                    <select
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        id="status">
                                        <option selected>Semua</option>
                                        <option value="tunjangan_kesehatan"
                                            {{ request()->jenis == 'tunjangan_kesehatan' ? 'selected' : '' }}>Kesehatan
                                        </option>
                                        <option value="tunjangan_pernikahan"
                                            {{ request()->jenis == 'tunjangan_pernikahan' ? 'selected' : '' }}>Pernikahan
                                        </option>
                                        <option value="tunjangan_bencana"
                                            {{ request()->jenis == 'tunjangan_bencana' ? 'selected' : '' }}>Bencana</option>
                                        <option value="tunjangan_kematian"
                                            {{ request()->jenis == 'tunjangan_kematian' ? 'selected' : '' }}>Kematian
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end rounded-b border-t border-gray-200 p-4 md:p-5">
                            <button
                                class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                type="button">Pencarian</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full rounded-lg bg-white p-5">

            <div class="mb-4 border-b border-gray-200">
                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium text-gray-500" id="tabs-example"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600"
                            id="menunggu-tab-example" type="button" role="tab" aria-controls="menunggu-example"
                            aria-selected="false">
                            Menunggu
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600"
                            id="proses-tab-example" type="button" role="tab" aria-controls="proses-example"
                            aria-selected="false">
                            Proses
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600"
                            id="ditolak-tab-example" type="button" role="tab" aria-controls="ditolak-example"
                            aria-selected="false">
                            Ditolak
                        </button>
                    </li>
                </ul>
            </div>
            <div id="tabContentExample">
                <div class="hidden rounded-lg bg-gray-50" id="menunggu-example" role="tabpanel"
                    aria-labelledby="menunggu-tab-example">
                    <p class="text-sm text-gray-500">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="0 bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Kode
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Jenis Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Besar Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Status
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-white hover:bg-gray-50">
                                <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                    20 Oktober 2023
                                </th>
                                <td class="px-6 py-4">
                                    8172KASN1
                                </td>
                                <td class="px-6 py-4">
                                    Kesehatan
                                </td>
                                <td class="px-6 py-4">
                                    150.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="me-2 rounded bg-purple-400 px-2.5 py-0.5 text-xs font-medium text-purple-800">Belum</span>
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="hidden rounded-lg bg-gray-50 p-2" id="proses-example" role="tabpanel"
                    aria-labelledby="proses-tab-example">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="0 bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Kode
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Jenis Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Besar Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Status
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-white hover:bg-gray-50">
                                <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                    20 Oktober 2023
                                </th>
                                <td class="px-6 py-4">
                                    8172KASN1
                                </td>
                                <td class="px-6 py-4">
                                    Kesehatan
                                </td>
                                <td class="px-6 py-4">
                                    150.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="me-2 rounded bg-yellow-300 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Proses</span>
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hidden rounded-lg bg-gray-50 p-2" id="ditolak-example" role="tabpanel"
                    aria-labelledby="ditolak-tab-example">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="0 bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Kode
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Jenis Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Besar Tunjangan
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Status
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-white hover:bg-gray-50">
                                <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                    20 Oktober 2023
                                </th>
                                <td class="px-6 py-4">
                                    8172KASN1
                                </td>
                                <td class="px-6 py-4">
                                    Kesehatan
                                </td>
                                <td class="px-6 py-4">
                                    150.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="me-2 rounded bg-red-300 px-2.5 py-0.5 text-xs font-medium text-red-800">Ditolak</span>
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Datepicker(document.getElementById('inp-tanggal'), {
                language: "id",
                weekStart: 1,
                autohide: true,
                clearBtn: true,
                todayBtn: true,
                format: "dd-mm-yyyy",
            });
        });
    </script>

    <script type="module">
        const tabsElement = document.getElementById('tabs-example');

        // create an array of objects with the id, trigger element (eg. button), and the content element
        const tabElements = [{
                id: 'menunggu',
                triggerEl: document.querySelector('#menunggu-tab-example'),
                targetEl: document.querySelector('#menunggu-example'),
            },
            {
                id: 'proses',
                triggerEl: document.querySelector('#proses-tab-example'),
                targetEl: document.querySelector('#proses-example'),
            },
            {
                id: 'ditolak',
                triggerEl: document.querySelector('#ditolak-tab-example'),
                targetEl: document.querySelector('#ditolak-example'),
            },
        ];

        // options with default values
        const options = {
            defaultTabId: 'menunggu',
            activeClasses: 'text-blue-600 hover:text-blue-600 !border-blue-600',
            inactiveClasses: 'text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300',
        };

        // instance options with default values
        const instanceOptions = {
            id: 'tabs-example',
            override: true
        };

        const tabs = new Tabs(tabsElement, tabElements, options, instanceOptions);
    </script>
@endpush
