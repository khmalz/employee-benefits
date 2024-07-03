@extends('dashboard.layouts.main')

@section('content')
    <div>
        @forelse ($groupedNotifications as $label => $notifications)
            @if ($loop->first)
                <div class="w-full text-end">
                    <form method="POST" action="{{ route('notification.read') }}">
                        @csrf
                        <button
                            class="rounded-lg bg-blue-500 px-4 py-1.5 text-center text-xs font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            type="submit">Read
                            All</button>
                    </form>
                </div>
            @endif

            <h1 class="mb-3 text-xl font-semibold">
                {{ $label }}
            </h1>
            <div class="mb-3 flex flex-col space-y-3">
                @foreach ($notifications as $notification)
                    <div
                        class="{{ is_null($notification->read_at) ? 'bg-blue-50' : 'bg-white' }} flex w-full items-center justify-between rounded-lg p-5">
                        @php
                            $status = strtolower($notification->data['status']);
                            [$bgColor, $iconColor, $statusText, $additionalText] = match ($status) {
                                'progress' => ['bg-yellow-300/80', 'text-yellow-600', 'diproses', 'sedang'],
                                'done' => ['bg-green-300/80', 'text-green-600', 'selesai', 'telah'],
                                'reject' => ['bg-red-300/80', 'text-red-600', 'ditolak', 'telah'],
                                default => ['bg-gray-300/80', 'text-gray-600', 'diketahui', 'tidak'],
                            };
                        @endphp
                        <div class="flex items-center space-x-4">
                            <div class="{{ $bgColor }} flex h-9 w-9 items-center justify-center rounded-full">
                                <svg class="{{ $iconColor }} h-5 w-5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p>Permintaan <a class="font-medium hover:underline"
                                        href="{{ route('benefit.show', $notification->data['code']) }}">tunjangan
                                        {{ $notification->data['type'] }}</a> anda {{ $additionalText }} <span
                                        class="{{ $iconColor }}">{{ $statusText }}</span></p>
                                <p class="mt-0.5 text-xs text-gray-500">
                                    {{ $notification->created_at->diffForHumans(['options' => \Carbon\Carbon::CEIL]) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="flex w-full items-center justify-between rounded-lg bg-white p-5">
                <p>No Notification</p>
            </div>
        @endforelse
    </div>
@endsection
