<x-panel-layout>
    <div class="bg-white shadow-lg rounded-lg mb-4">
        <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
        <h2 class="text-lg font-bold text-dgreen">Data Karyawan</h2>
            <button
                class="bg-dgreen hover:bg-dgreen text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center"
                data-modal-target="default-modal" data-modal-toggle="default-modal">
                <svg class="fill-current w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M9.66833 0C10.2897 0 10.7933 0.50368 10.7933 1.125V7.875H17.5433C18.1647 7.875 18.6683 8.37868 18.6683 9C18.6683 9.62132 18.1647 10.125 17.5433 10.125H10.7933V16.875C10.7933 17.4963 10.2897 18 9.66833 18C9.04701 18 8.54333 17.4963 8.54333 16.875V10.125H1.79333C1.17201 10.125 0.668335 9.62132 0.668335 9C0.668335 8.37868 1.17201 7.875 1.79333 7.875H8.54333V1.125C8.54333 0.50368 9.04701 0 9.66833 0Z"/></svg>
                <span class="inline-block text-body">Tambah</span>
            </button>
        </div>
        <div class="px-4 pb-4">
            <div class="overflow-x-auto mt-4">
                <!-- Livewire Component untuk menampilkan data karyawan -->
                @livewire('karyawan.show')
            </div>
        </div>
    </div>
</x-panel-layout>
