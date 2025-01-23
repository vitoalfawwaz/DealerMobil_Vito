<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __("Anda telah login!") }}
                {{ __('Selamat Datang Kembali di Vitz Autocar') }}
            </h2>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ now()->format('l, d F Y') }} <!-- Menampilkan tanggal saat ini -->
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-100 to-blue-50 dark:from-gray-800 dark:to-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <div class="mt-6 flex justify-center">
                        <a href="{{ route('produk.index') }}"
                           class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition-all duration-200">
                            {{ __('Lihat Produk') }}
                        </a>
                        <a href="{{ route('transaksi.index') }}"
                           class="ml-4 px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-200">
                            {{ __('Lihat Transaksi') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
