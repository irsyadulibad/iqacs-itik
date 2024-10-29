<x-app-layout>
    <div class="grid grid-cols-[65%_35%] gap-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
            <div class="bg-slate-100 px-4 py-3 border-b">
                <h3 class="text-md font-semibold text-gray-900">
                    Statistik Suhu
                </h3>
            </div>
            <div class="p-4">
                <canvas
                    id="temp-device-chart"
                    data-device="{{ $device->id }}"
                ></canvas>
            </div>
        </div>

        <div class="bg-dprimary rounded-lg"></div>
    </div>

    <div class="grid grid-cols-[65%_35%] mt-8 gap-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
            <div class="bg-slate-100 px-4 py-3 border-b">
                <h3 class="text-md font-semibold text-gray-900">
                    Statistik Kelembaban
                </h3>
            </div>
            <div class="p-4">
                <canvas
                    id="humi-device-chart"
                    data-device="{{ $device->id }}"
                ></canvas>
            </div>
        </div>
        <div class="bg-dprimary rounded-lg"></div>
    </div>
</x-app-layout>
