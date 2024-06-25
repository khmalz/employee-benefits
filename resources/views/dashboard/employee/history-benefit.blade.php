@extends('dashboard.layouts.main')

@section('content')
    <div>
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
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600"
                            id="selesai-tab-example" type="button" role="tab" aria-controls="selesai-example"
                            aria-selected="false">
                            Selesai
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
                        @if ($pendingBenefits->isNotEmpty())
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
                                    @foreach ($pendingBenefits as $benefit)
                                        <tr class="border-b bg-white hover:bg-gray-50">
                                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                                                scope="row">
                                                {{ $benefit->created_at->format('d F Y') }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $benefit->code }}
                                            </td>
                                            <td class="px-6 py-4 capitalize">
                                                {{ $benefit->type }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ number_format($benefit->amount, 0, '', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="me-2 rounded bg-purple-400 px-2.5 py-0.5 text-xs font-medium text-purple-800">Menunggu</span>
                                            </td>
                                            <td class="flex items-center px-6 py-4">
                                                <a class="font-medium text-blue-600 hover:underline"
                                                    href="#">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-sm text-gray-500">Tidak ada data</p>
                        @endif
                    </p>
                </div>
                <div class="hidden rounded-lg bg-gray-50 p-2" id="proses-example" role="tabpanel"
                    aria-labelledby="proses-tab-example">
                    @if ($progressBenefits->isNotEmpty())
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
                                @foreach ($progressBenefits as $benefit)
                                    <tr class="border-b bg-white hover:bg-gray-50">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                            {{ $benefit->created_at->format('d F Y') }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $benefit->code }}
                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $benefit->type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ number_format($benefit->amount, 0, '', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="me-2 rounded bg-yellow-300 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Proses</span>
                                        </td>
                                        <td class="flex items-center px-6 py-4">
                                            <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-sm text-gray-500">Tidak ada data</p>
                    @endif
                </div>
                <div class="hidden rounded-lg bg-gray-50 p-2" id="selesai-example" role="tabpanel"
                    aria-labelledby="selesai-tab-example">
                    @if ($doneBenefits->isNotEmpty())
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
                                @foreach ($doneBenefits as $benefit)
                                    <tr class="border-b bg-white hover:bg-gray-50">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                            {{ $benefit->created_at->format('d F Y') }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $benefit->code }}
                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $benefit->type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ number_format($benefit->amount, 0, '', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="me-2 rounded bg-green-400 px-2.5 py-0.5 text-xs font-medium text-green-800">Selesai</span>
                                        </td>
                                        <td class="flex items-center px-6 py-4">
                                            <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-sm text-gray-500">Tidak ada data</p>
                    @endif
                </div>
                <div class="hidden rounded-lg bg-gray-50 p-2" id="ditolak-example" role="tabpanel"
                    aria-labelledby="ditolak-tab-example">
                    @if ($rejectedBenefits->isNotEmpty())
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
                                @foreach ($rejectedBenefits as $benefit)
                                    <tr class="border-b bg-white hover:bg-gray-50">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                            {{ $benefit->created_at->format('d F Y') }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $benefit->code }}
                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $benefit->type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ number_format($benefit->amount, 0, '', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="me-2 rounded bg-red-300 px-2.5 py-0.5 text-xs font-medium text-red-800">Ditolak</span>
                                        </td>
                                        <td class="flex items-center px-6 py-4">
                                            <a class="font-medium text-blue-600 hover:underline" href="#">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-sm text-gray-500">Tidak ada data</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        const urlParams = new URLSearchParams(window.location.search);
        const statusParam = urlParams.get('status');

        if (!statusParam) {
            const newUrl = window.location.pathname + '?status=menunggu';
            window.location.replace(newUrl);
        }

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
                id: 'selesai',
                triggerEl: document.querySelector('#selesai-tab-example'),
                targetEl: document.querySelector('#selesai-example'),
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
