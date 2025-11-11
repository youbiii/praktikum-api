<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-900
         shadow-md overflow-hidden sm:rounded-lg">

            <!-- Judul -->
            <h2 class="text-center text-3xl font-bold text-gray-900 dark:text-gray-100">
                Sign Up
            </h2>
            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-2">
                Join our community with all time access.
            </p>

            <!-- Tombol Google -->
            <div class="mt-6">
                {{--
                    Tombol ini menggunakan route yang SAMA dengan di halaman login.
                    Controller (GoogleLoginController) yang kita buat
                    akan otomatis membuat akun baru jika email Google
                    tersebut belum terdaftar.
                --}}
                <a href="#"
                   class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-white-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <!-- SVG Logo Google -->
                    <svg class="w-5 h-5 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                        <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.222,0-9.641-3.657-11.303-8H6.306C9.656,35.663,16.318,40,24,40z"/>
                        <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571l6.19,5.238C39.712,34.464,44,29.805,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                    </svg>
                    Sign up with Google
                </a>
            </div>

            <!-- Pemisah "or with email" -->
            <div class="flex items-center justify-center my-6">
                <div class="border-b border-gray-300 dark:border-gray-600 w-full"></div>
                <div class="px-4 text-sm text-gray-500 dark:text-gray-400">
                    or with email
                </div>
                <div class="border-b border-gray-300 dark:border-gray-600 w-full"></div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Tombol Register -->
                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Sign Up') }}
                    </x-primary-button>
                </div>

                <!-- Link ke Login -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Log in here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
