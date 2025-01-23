<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 mt-12">
        @csrf

        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-6">Daftar Akun Baru</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="'Nama'" />
            <x-text-input id="name" class="block mt-1 w-full px-4 py-2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full px-4 py-2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="'Kata Sandi'" />
            <x-text-input id="password" class="block mt-1 w-full px-4 py-2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="'Konfirmasi Kata Sandi'" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full px-4 py-2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
        </div>

        <div class="flex items-center justify-between">
            <a class="text-sm text-blue-600 dark:text-blue-400 hover:underline" href="{{ route('login') }}">
                Sudah punya akun? Masuk
            </a>

            <x-primary-button class="text-sm text-gray-600 dark:text-gray-400">
                Daftar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
