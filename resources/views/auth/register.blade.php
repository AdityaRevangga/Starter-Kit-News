<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-100 via-white to-blue-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center mb-6">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Register News" class="mx-auto h-16 w-16 rounded-full shadow-lg mb-2">
                <h2 class="mt-2 text-3xl font-bold text-gray-900">Daftar Akun Baru</h2>
                <p class="mt-1 text-sm text-gray-500">Bergabung untuk mengelola berita dan kategori</p>
            </div>
            <div class="bg-white shadow-xl rounded-lg p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <!-- Name -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input id="name" name="name" type="text" required autofocus autocomplete="name" placeholder="Nama Lengkap" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Email Address -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input id="email" name="email" type="email" required autocomplete="username" placeholder="Email" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Confirm Password -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Konfirmasi Password" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 font-semibold text-lg transition duration-150">
                            <i class="fas fa-user-plus mr-2"></i> Daftar
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <span class="text-gray-600">Sudah punya akun?</span>
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
