<x-auth-layout>
    <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-2xl"
    >
        <div class="text-center mb-6">
            <a href="/">
                <img src="/images/logo.png" class="w-16 h-16 mx-auto" />
            </a>
        </div>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <form
            class="max-w-md bg-white mx-auto p-4 shadow-md rounded-lg"
            method="POST"
            action="{{ route("login") }}"
        >
            @csrf
            <div class="text-center mt-4">
                <h1 class="text-2xl font-bold text-black">Login</h1>
                <p class="text-gray-600 mt-2">Selamat datang di IQACS Itik</p>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700"
                >
                    Email
                </label>
                <input
                    id="email"
                    class="mt-1 p-2 border rounded-lg w-full"
                    type="email"
                    name="email"
                    required
                    autofocus
                    placeholder="Masukkan Email Anda"
                />
                @error("email")
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label
                    for="password"
                    class="block text-sm font-medium text-gray-700"
                >
                    Password
                </label>
                <div class="relative">
                    <input
                        id="password"
                        placeholder="Masukkan Password Anda"
                        type="password"
                        class="mt-1 p-2 border rounded-lg w-full"
                        name="password"
                    />
                </div>
                @error("password")
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Forgot Password -->
            <div class="mb-2 mt-2 flex justify-end">
                <a class="text-sm text-black hover:text-black-100" href="#">
                    Forgot your password?
                </a>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center">
                <button
                    type="submit"
                    class="w-full px-4 py-2 bg-dprimary text-white rounded-md hover:bg-lprimary focus:outline-none focus:bg-dprimary"
                >
                    Log in
                </button>
            </div>
        </form>
    </div>
</x-auth-layout>
