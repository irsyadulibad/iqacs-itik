<x-app-layout>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
        <div class="bg-slate-100 px-4 py-3 border-b">
            <h3 class="text-md font-semibold text-gray-900">Dashboard</h3>
        </div>
        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($devices as $device)
                <div
                    class="rounded-lg bg-dprimary font-bold text-white cursor-pointer"
                    data-id="{{ $device->id }}"
                >
                    <div class="p-5">
                        <h6 class="m-0">Lokasi {{ $device->name }}</h6>
                        <p class="m-0 mt-1 text-sm">
                            Keterangan Lokasi:
                            <a
                                target="_blank"
                                class="text-sm font-normal pl-3 underline"
                                href="https://google.com/maps?q={{ $device->latitude }}, {{ $device->longitude }}"
                            >
                                <i class="ti ti-map-pin-filled"></i>
                                GMaps
                            </a>
                        </p>

                        <div class="mt-4">
                            <div class="flex items-center justify-between">
                                <span class="flex items-center">
                                    <i class="ti ti-temperature text-3xl"></i>
                                    <p class="m-0 inline">Temperature</p>
                                </span>
                                <span class="lg:pr-[50%]">:</span>
                                <span
                                    class="flex items-start justify-center w-16"
                                >
                                    @if (! $device->temp?->value)
                                        <span>-</span>
                                    @else
                                        <span class="m-0 text-2xl">
                                            {{ $device->temp->value }}
                                        </span>
                                        <span class="m-0 text-xs">°C</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <span class="flex items-center">
                                    <i
                                        class="ti ti-droplet-half-2 text-3xl"
                                    ></i>
                                    <p class="m-0 inline">Kelembaban</p>
                                </span>
                                <span class="lg:pr-[50%]">:</span>
                                <span
                                    class="flex items-start justify-center w-16"
                                >
                                    @if (! $device->humi?->value)
                                        <span>-</span>
                                    @else
                                        <span class="m-0 text-2xl">
                                            {{ $device->humi->value }}
                                        </span>
                                        <span class="m-0 text-xs">%</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <span class="flex items-center min-w-32">
                                    <i class="ti ti-ripple-off text-3xl"></i>
                                    <p class="m-0 inline">Amonia</p>
                                </span>
                                <span class="lg:pr-[50%]">:</span>
                                <span
                                    class="flex items-start justify-center w-16"
                                >
                                    @if (! $device->ammo?->value)
                                        <span>-</span>
                                    @else
                                        <span class="m-0 text-2xl">
                                            {{ $device->ammo->value }}
                                        </span>
                                        <span class="m-0 text-xs">ppm</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <p class="text-[12px] font-normal mt-4 text-right">
                            Terakhir diupdate:
                            {{ $device?->temp?->created_at->locale("id")->diffForHumans() }}
                        </p>
                    </div>
                    <div
                        class="bg-gray-100 w-full px-4 py-2 rounded-b-lg flex justify-between items-center"
                    >
                        <div class="flex flex-col gap-1">
                            <p class="text-gray-800 font-medium">
                                Kontrol Manual
                            </p>
                            <label
                                class="inline-flex items-center cursor-pointer"
                            >
                                <input
                                    type="checkbox"
                                    value=""
                                    class="sr-only peer manual-control"
                                    data-id="{{ $loop->iteration }}"
                                    @checked($device->state?->control_value)
                                />
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-orange dark:peer-focus:ring-orange dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange"
                                ></div>

                                <span
                                    class="peer peer-checked:hidden ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    OFF
                                </span>
                                <span
                                    class="peer hidden peer-checked:block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    ON
                                </span>
                            </label>
                        </div>
                        <button
                            data-modal-target="default-modal"
                            data-modal-toggle="default-modal"
                            class="px-5 py-2 rounded-md bg-orange text-white"
                        >
                            Kontrol Otomatis
                        </button>
                    </div>
                </div>
            @endforeach

            <div
                id="default-modal"
                tabindex="-1"
                aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
            >
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div
                        class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                    >
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
                        >
                            <h3
                                class="text-xl font-semibold text-gray-900 dark:text-white"
                            >
                                Timer Kontrol Otomatis
                            </h3>
                            <button
                                type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal"
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
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                    />
                                    <path d="M18 6l-12 12" />
                                    <path d="M6 6l12 12" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-5">
                            <div class="space-y-5">
                                <label for="start" class="font-medium">
                                    Waktu Pagi
                                </label>
                                <div class="flex gap-5">
                                    <input
                                        type="time"
                                        name="start"
                                        id="start"
                                        class="w-full rounded border border-gray-300"
                                    />
                                    <input
                                        type="time"
                                        name="end"
                                        id="end"
                                        class="w-full rounded border border-gray-300"
                                    />
                                </div>
                            </div>
                            <div class="space-y-5">
                                <label for="start" class="font-medium">
                                    Waktu Sore
                                </label>
                                <div class="flex gap-5">
                                    <input
                                        type="time"
                                        name="start"
                                        id="start"
                                        class="w-full rounded border border-gray-300"
                                    />
                                    <input
                                        type="time"
                                        name="end"
                                        id="end"
                                        class="w-full rounded border border-gray-300"
                                    />
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600"
                        >
                            <button
                                data-modal-hide="default-modal"
                                type="button"
                                class="text-white bg-orange hover:bg-orange focus:ring-4 focus:outline-none focus:ring-orange font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange dark:hover:bg-orange dark:focus:ring-orange"
                            >
                                Ubah Timer
                            </button>
                            <button
                                data-modal-hide="default-modal"
                                type="button"
                                class="text-red-500 bg-white border border-red-500 focus:ring-4 focus:outline-none focus:ring-redbg-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-500 dark:focus:ring-redbg-red-500"
                            >
                                Hapus Timer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push("script")
        {{--
            <script>
            document.querySelectorAll('[data-id]').forEach((el) => {
            el.addEventListener('click', function (e) {
            if (e.target.nodeName == 'A') return
            window.location.href = `/device/${el.dataset.id}`
            })
            })
            </script>
        --}}
    @endpush
</x-app-layout>
