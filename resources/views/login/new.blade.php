@extends('templates.main')

@section('content')
    <div class="min-h-11/12 flex flex-col justify-center py-12 sm:px-6 lg:px-8">

        <h1 class="text-center">Create a new account</h1>

        <div class="mx-auto sm:w-full sm:max-w-md mt-5 px-6 py-5">

            <form action="{{ route('login.create') }}" method="POST" class="mt-4">
                @csrf

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 ">Name</label>
                    <div class="mt-1">
                        <input type="name" id="name"
                            class="block w-full rounded-md border placeholder-gray-400 shadow-sm px-3 py-2 focus:outline
                            invalid:border-pink-500
                            has-invalid:invalid:border-pink-500
                            @error('name')
                            <?= 'focus:border-pink-500 focus:outline-pink-500 border-pink-500 text-pink-600' ?>
                            @else
                            <?= 'border-gray-300 focus:border-sky-500 focus:outline-sky-500' ?>    
                            @enderror
                            sm:text-sm"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" id="email"
                            class="block w-full rounded-md border placeholder-gray-400 shadow-sm px-3 py-2 focus:outline
                            invalid:border-pink-500
                            @error('email')
                            <?= 'focus:border-pink-500 focus:outline-pink-500 border-pink-500 text-pink-600' ?>
                            @else
                            <?= 'border-gray-300 focus:border-sky-500 focus:outline-sky-500' ?>    
                            @enderror
                            sm:text-sm"
                            placeholder="you@example.com" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input type="password" id="password"
                            class="block w-full rounded-md border placeholder-gray-400 shadow-sm px-3 py-2 focus:outline
                            invalid:border-pink-500
                            @error('password')
                            <?= 'focus:border-pink-500 focus:outline-pink-500 border-pink-500 text-pink-600' ?>
                            @else
                            <?= 'border-gray-300 focus:border-sky-500 focus:outline-sky-500' ?>                             
                            @enderror
                            sm:text-sm"
                            name="password" value="{{ old('password') }}">
                        @error('password')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>
                    <div class="mt-1">
                        <input type="password" id="password_confirmation"
                            class="block w-full rounded-md border placeholder-gray-400 shadow-sm px-3 py-2 focus:outline
                            invalid:border-pink-500
                            @error('password_confirmation')
                            <?= 'focus:border-pink-500 focus:outline-pink-500 border-pink-500 text-pink-600' ?>
                            @else
                            <?= 'border-gray-300 focus:border-sky-500 focus:outline-sky-500' ?>                             
                            @enderror
                            sm:text-sm"
                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="mt-6 text-center">
                    <button type="submit"
                        class="rounded-md bg-sky-500 px-5 py-2.5 text-sm leading-5 font-semibold text-white hover:bg-sky-700">
                        Create Account
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
