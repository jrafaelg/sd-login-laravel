@extends('templates.main')

@section('content')
    <div class="min-h-11/12 bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md py-8">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 max-w">
                Or
                <a href="{{ route('login.new') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    create an account
                </a>

                <a href="{{ route('home') }}">home</a>
            </p>
        </div>


        <div class="mx-auto sm:w-full sm:max-w-md border-x border-x-gray-200 px-6 py-5">
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
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
                            placeholder="you@example.com" name="email" value="test@example.com">
                        @error('email')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input type="password" id="password" autocomplete="none" invalid=true
                            class="block w-full rounded-md border placeholder-gray-400 shadow-sm px-3 py-2 focus:outline
                            invalid:border-pink-500
                            @error('password')
                            <?= 'focus:border-pink-500 focus:outline-pink-500 border-pink-500 text-pink-600' ?>
                            @else
                            <?= 'border-gray-300 focus:border-sky-500 focus:outline-sky-500' ?>                             
                            @enderror
                            sm:text-sm"
                            name="password" value="123" style="">
                        @error('password')
                            <span class="mt-2 text-pink-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <button type="submit"
                        class="rounded-md bg-sky-500 px-5 py-2.5 text-sm leading-5 font-semibold text-white hover:bg-sky-700">Login</button>
                </div>
            </form>
        </div>


    </div>
@endsection
