<div
    id="automatic-modal-{{ $device->id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
>
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <form
            class="relative bg-white rounded-lg shadow dark:bg-gray-700 automatic-form"
            method="POST"
        >
            <input type="hidden" name="device_id" value="{{ $device->id }}" />
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
            >
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Timer Kontrol Otomatis
                </h3>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="automatic-modal-{{ $device->id }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-x"
                    >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-5">
                <div class="space-y-5">
                    <label for="start" class="font-medium">Waktu Pagi</label>
                    <div class="flex gap-5">
                        <input
                            type="time"
                            name="morning[start]"
                            class="w-full rounded border border-gray-300"
                            value="{{ $device->morning?->start }}"
                        />
                        <input
                            type="time"
                            name="morning[end]"
                            class="w-full rounded border border-gray-300"
                            value="{{ $device->morning?->end }}"
                        />
                    </div>
                </div>
                <div class="space-y-5">
                    <label for="start" class="font-medium">Waktu Sore</label>
                    <div class="flex gap-5">
                        <input
                            type="time"
                            name="afternoon[start]"
                            class="w-full rounded border border-gray-300"
                            value="{{ $device->afternoon?->start }}"
                        />
                        <input
                            type="time"
                            name="afternoon[end]"
                            class="w-full rounded border border-gray-300"
                            value="{{ $device->afternoon?->end }}"
                        />
                    </div>
                </div>
            </div>
            <div
                class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600"
            >
                <button
                    type="submit"
                    class="text-white bg-orange hover:bg-orange focus:ring-4 focus:outline-none focus:ring-orange font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange dark:hover:bg-orange dark:focus:ring-orange"
                >
                    Ubah Timer
                </button>
                <button
                    type="button"
                    class="text-red-500 bg-white border border-red-500 focus:ring-4 focus:outline-none focus:ring-redbg-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-500 dark:focus:ring-redbg-red-500 automatic-delete"
                    data-id="{{ $device->id }}"
                >
                    Hapus Timer
                </button>
            </div>
        </form>
    </div>
</div>
