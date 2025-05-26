@extends('templates.main')

@section('content')
    <div>

        @if (auth()->check())
            @can('admin')
                <p class="alert alert-success mt-2">You are logged in as an admin</p>
            @endcan
            <p class="alert alert-danger mt-2">You are already logged in</p>
            <p>{{ auth()->user()->name }}</p>
            <a href="{{ route('login.destroy') }}">logout</a>
        @endif

        <a href="{{ route('login') }}">login</a>

        <h1>Welcome to the Home Page</h1>

        <p>This is a simple Laravel Blade template.</p>

        @can('post.view')
            <p class="alert alert-success mt-2">You can view posts</p>
        @endcan

        @can('post.edit')
            <p class="alert alert-success mt-2">You can edit posts</p>
        @endcan

        @can('post.delete')
            <p class="alert alert-success mt-2">You can delete posts</p>
        @endcan

        @can('post.create')
            <p class="alert alert-success mt-2">You can create posts</p>
        @endcan

        @can('employees.delete')
            <p class="alert alert-success mt-2">You can delete employees</p>
        @endcan

        <button class="bg-sky-50">test</button>
        <button class="rounded-full bg-sky-300 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3">Submit</button>

        <div
            class="mx-auto flex max-w-sm items-center gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
            <img class="size-12 shrink-0" src="https://flowbite.com/docs/images/logo.svg" alt="ChitChat Logo" />
            <div>
                <div class="text-xl font-medium text-black dark:text-white">ChitChat</div>
                <p class="text-gray-500 dark:text-gray-400">You have a new message!</p>
            </div>
        </div>

    </div>
@endsection
