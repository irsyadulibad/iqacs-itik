<header class="bg-white border-b border-gray-200 p-4 shadow-lg">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <div class="text-lg font-semibold text-gray-800 mr-2"></div>
        </div>
        <div class="flex-grow border-l border-gray-200 mx-4"></div>
        <div class="relative flex items-center">
            <div class="border-l border-gray-300 h-6 mr-6"></div>
            <div>
                <span class="block text-xs text-gray-600">{{ Auth::user()->name }}</span>
            </div>
            <button onclick="toggleDropdown(event)" class="flex items-center focus:outline-none ml-2">
                <img src="https://via.placeholder.com/40" alt="Profile" class="w-8 h-8 rounded-full">
            </button>
            <div id="profileDropdown"
                class="origin-top-right absolute right-0 mt-44 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 hidden">
                <a href="{{ route('profile') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                @livewire('components.logout-button')
            </div>
        </div>
    </div>
</header>
