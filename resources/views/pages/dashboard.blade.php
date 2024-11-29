<x-app-layout>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
        <div class="bg-slate-100 px-4 py-3 border-b">
            <h3 class="text-md font-semibold text-gray-900">Dashboard</h3>
        </div>
        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($devices as $device)
                <div
                    class="rounded-lg p-5 bg-dprimary font-bold text-white cursor-pointer"
                    data-id="{{ $device->id }}"
                >
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
                            <span class="flex items-start justify-center w-16">
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
                                <i class="ti ti-droplet-half-2 text-3xl"></i>
                                <p class="m-0 inline">Kelembaban</p>
                            </span>
                            <span class="lg:pr-[50%]">:</span>
                            <span class="flex items-start justify-center w-16">
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
                            <span class="flex items-start justify-center w-16">
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
            @endforeach
        </div>
    </div>

    @push("script")
        <script>
            document.querySelectorAll('[data-id]').forEach((el) => {
                el.addEventListener('click', function (e) {
                    if (e.target.nodeName == 'A') return
                    window.location.href = `/device/${el.dataset.id}`
                })
            })
        </script>
    @endpush
</x-app-layout>
