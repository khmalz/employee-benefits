@extends('auth.layouts.main')

@section('content')
    @error('email')
        <div class="initial-toastify fixed right-1 top-1 flex w-full max-w-xs transform items-center rounded-lg bg-white p-4 text-gray-500 shadow transition-transform duration-300 ease-in-out md:right-5 md:top-5"
            id="toast-top-right" role="alert">
            <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Email atau password salah</div>
            <button
                class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300"
                data-dismiss-target="#toast-top-right" type="button" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @enderror

    <div id="fail" data-fail="{{ $errors->first('email') }}"></div>

    <h1 class="mb-5 text-3xl font-semibold">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-5">
            <label class="mb-2 block text-sm font-medium text-gray-900" for="email">Email</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="email" name="email" type="email" placeholder="name@gmail.com" required autocomplete="email">
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-medium text-gray-900" for="password">Password</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="password" name="password" type="password" required autocomplete="current-password">
        </div>
        <button
            class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
            type="submit">Login</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            if (document.getElementById('fail').getAttribute('data-fail')) {
                const toast = document.getElementById('toast-top-right');
                setTimeout(() => {
                    toast.classList.remove('initial-toastify');
                    toast.classList.add('translate-y-0');
                }, 200);

                setTimeout(() => {
                    toast.classList.add('initial-toastify');
                    toast.classList.remove('translate-y-0');
                }, 2200);
            }
        });
    </script>
@endpush
