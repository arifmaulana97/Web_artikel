{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.public') {{-- Gunakan @extends untuk layout --}}

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full flex bg-white shadow-lg rounded-lg overflow-hidden">
            {{-- Bagian Kiri: Form Login --}}
            <div class="w-full lg:w-1/2 p-8 flex flex-col justify-center">
                <div class="text-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500 mx-auto" />
                    </a>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Masuk untuk mengakses Artikel Website
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Daftar di sini
                        </a>
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email / Username')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Ingatkan saya') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>

                    <x-primary-button class="w-full justify-center">
                        {{ __('Login') }}
                    </x-primary-button>
                </form>
            </div>

            {{-- Bagian Kanan: Gambar --}}
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-center"
                style="background-image: url('{{ asset('images/login_register_background.jpg') }}');">
                {{-- PASTIKAN ANDA MEMILIKI GAMBAR INI DI public/images/login_register_background.jpg --}}
            </div>
        </div>
    </div>
@endsection
