<x-guest-layout>
    <div class="mb-6 text-sm text-gray-600 dark:text-gray-400 text-center">
        {{ __('Lupa kata sandi Anda? Jangan khawatir. Masukkan alamat email Anda, dan kami akan mengirimkan tautan untuk mereset kata sandi Anda.') }}
    </div>

    <!-- Status Session -->
    <x-auth-session-status class="mb-6 text-sm text-green-500 dark:text-green-400 text-center" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Alamat Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="'Alamat Email'" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Tombol Kirim -->
            <div class="flex items-center justify-center mt-6">
                <x-primary-button>
                    {{ __('Kirim Tautan Reset Kata Sandi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
