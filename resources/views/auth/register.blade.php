{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.public') {{-- Gunakan @extends untuk layout --}}

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full flex bg-white shadow-lg rounded-lg overflow-hidden">
            {{-- Bagian Kiri: Form Register --}}
            <div class="w-full lg:w-1/2 p-8 flex flex-col justify-center">
                <div class="text-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500 mx-auto" />
                    </a>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Buat Akun Baru
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Login di sini
                        </a>
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Hapus atau komentari blok Terms and Privacy Policy jika tidak digunakan,
                     terutama jika Anda hanya menggunakan Breeze dan bukan Jetstream.
                     Gunakan komentar Blade ({{-- --}}) atau @php @endphp untuk mengomentari blok Blade. --}}
                    {{--
                @if (class_exists(Laravel\Jetstream\Jetstream::class) && Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-input-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-input-label>
                    </div>
                @endif
                --}}

                    <x-primary-button class="w-full justify-center">
                        {{ __('Daftar') }}
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
