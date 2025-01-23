<x-guest-layout>
    <!-- Status Session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 mt-12">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center">
            Selamat Datang Kembali
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 text-center">
            Masukkan email dan kata sandi Anda untuk masuk.
        </p>

        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Alamat Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="'Alamat Email'" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <x-input-label for="password" :value="'Kata Sandi'" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Ingat Saya -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    Ingat Saya
                </label>
            </div>

            <!-- Tindakan -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 dark:text-blue-400 hover:underline" href="{{ route('password.request') }}">
                        Lupa Kata Sandi?
                    </a>
                @endif

                <x-primary-button class="ml-4">
                    Masuk
                </x-primary-button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                    Daftar Sekarang
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
