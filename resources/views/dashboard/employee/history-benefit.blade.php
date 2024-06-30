@extends('dashboard.layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <form method="GET">
                <div class="relative mb-2 inline-block">
                    <select
                        class="appearance-none border-0 border-b-2 border-blue-500 !bg-none py-2.5 text-sm text-blue-500 focus:outline-none focus:ring-0"
                        id="status" name="status" onchange="this.form.submit()">
                        <option class="text-gray-900" value="menunggu"
                            {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option class="text-gray-900" value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>
                            Proses</option>
                        <option class="text-gray-900" value="selesai"
                            {{ request('status') == 'selesai' ? 'selected' : '' }}>
                            Selesai</option>
                        <option class="text-gray-900" value="ditolak"
                            {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-blue-500">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M5.5 7l5 5 5-5H5.5z" />
                        </svg>
                    </div>
                </div>
            </form>
            @if ($benefits->isNotEmpty())
                <div class="relative overflow-x-auto">
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
                                    Nama
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
                            @foreach ($benefits as $benefit)
                                <tr class="border-b bg-white hover:bg-gray-50">
                                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                        {{ $benefit->created_at->format('d F Y') }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $benefit->code }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $benefit->employee->user->name }}
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{ $benefit->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($benefit->amount, 0, '', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $status = strtolower($benefit->status);
                                            [$color, $text] = match ($status) {
                                                'pending' => ['bg-purple-500 text-purple-800', 'Menunggu'],
                                                'progress' => ['bg-yellow-300 text-yellow-800', 'Proses'],
                                                'done' => ['bg-green-500 text-green-800', 'Selesai'],
                                                'reject' => ['bg-red-500 text-red-800', 'Ditolak'],
                                                default => ['bg-gray-500 text-gray-800', 'Unknown'],
                                            };
                                        @endphp
                                        <span
                                            class="{{ $color }} me-2 rounded px-2.5 py-0.5 text-xs font-medium text-white">{{ ucfirst($text) }}</span>
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <a class="font-medium text-blue-600 hover:underline"
                                            href="{{ route('benefit.show', $benefit) }}">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $benefits->appends([
                            'status' => request('status'),
                            'tanggal' => request('tanggal'),
                            'jenis' => request('jenis'),
                        ])->links() }}
                </div>
            @else
                <p class="my-4 text-sm text-gray-500">Tidak ada data</p>
            @endif
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
    </script>
@endpush
