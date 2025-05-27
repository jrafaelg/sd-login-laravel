{{-- @include('templates.master') --}}

@extends('templates.master')

@section('main')
    @if (auth()->check())
        <!-- navbar -->
        @include('templates.navbar')
        <!-- end navbar -->
    @endif

    @if (session()->has('success'))
        <div class="flex p-4 my-4 text-sm text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400 w-96 fixed top-20 right-5 dismissible"
            role="alert">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-2">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                    clip-rule="evenodd" />
            </svg>
            <div>
                <span class="font-medium">{{ session()->get('success') }}</span>
            </div>
        </div>
    @endif

    @error('error')
        <div class="flex p-4 my-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 w-96 fixed top-20 right-5 dismissible"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-2">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                    clip-rule="evenodd" />
            </svg>

            <div>
                <span class="font-medium">{{ $message }}</span>
                {{-- <ul class="mt-1.5 list-disc list-inside">
                    <li>At least 10 characters (and up to 100 characters)</li>
                    <li>At least one lowercase character</li>
                    <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
                </ul> --}}
            </div>
        </div>
    @enderror

    @if (session()->has('message'))
        <div class="flex p-4 my-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-500 w-96 fixed top-20 right-5 dismissible"
            role="alert">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-2">
                <path fill-rule="evenodd"
                    d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                    clip-rule="evenodd" />
            </svg>

            <div>
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    {{-- <div class="flex p-4 my-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-500 w-96 fixed top-20 right-5"
        role="alert">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-2">
            <path fill-rule="evenodd"
                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                clip-rule="evenodd" />
        </svg>

        <div>
            <span class="font-medium">sdf asdf asdfads fasdf </span>
        </div>
    </div> --}}

    <div class="container mx-auto items-center text-gray-500 max-w-7xl px-4 sm:px-6 lg:px-8 mt-4 pt-4 min-h-[85vh]">
        @yield('content')
    </div>
@endsection
