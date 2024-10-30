<x-app-layout>
    <div class="h-[400px]">
        <div class="grid lg:grid-cols-[65%_35%] gap-4">
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

            <div class="bg-dprimary rounded-lg">
                <div
                    class="text-left text-white max-w-2xl mx-auto p-8 pt-32 space-y-12"
                >
                    <h2 class="font-bold text-lg">Temperature (CH4)</h2>
                    <div class="space-y-5 relative">
                        <div class="relative">
                            <div
                                id="temp-device-indicator"
                                class="-top-3 left-0 w-[2px] h-[50px] absolute bg-black transition-all duration-200"
                            ></div>

                            <div
                                class="w-full p-3 rounded-full bg-gradient-to-r from-green-500 via-yellow-300 to-red-600"
                            ></div>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-lg">Baik</span>
                            <span class="text-lg">Buruk</span>
                        </div>
                    </div>
                    <p class="text-center text-lg">
                        Temperature (CH4) Saat ini
                    </p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-[65%_35%] mt-8 gap-4">
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
            <div class="bg-dprimary rounded-lg">
                <div
                    class="text-left text-white max-w-2xl mx-auto p-8 pt-32 space-y-12"
                >
                    <h2 class="font-bold text-lg">Humidity (CH4)</h2>
                    <div class="space-y-5">
                        <div class="relative">
                            <div
                                id="humi-device-indicator"
                                class="-top-3 left-0 w-[2px] h-[50px] absolute bg-black transition-all duration-200"
                            ></div>

                            <div
                                class="w-full p-3 rounded-full bg-gradient-to-r from-green-500 via-yellow-300 to-red-600"
                            ></div>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-lg">Baik</span>
                            <span class="text-lg">Buruk</span>
                        </div>
                    </div>
                    <p class="text-center text-lg">Humidity (CH4) Saat ini</p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-[65%_35%] mt-8 gap-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
                <div class="bg-slate-100 px-4 py-3 border-b">
                    <h3 class="text-md font-semibold text-gray-900">
                        Statistik Amonia
                    </h3>
                </div>
                <div class="p-4">
                    <canvas
                        id="ammo-device-chart"
                        data-device="{{ $device->id }}"
                    ></canvas>
                </div>
            </div>
            <div class="bg-dprimary rounded-lg">
                <div
                    class="text-left text-white max-w-2xl mx-auto p-8 pt-32 space-y-12"
                >
                    <h2 class="font-bold text-lg">Amonia (CH4)</h2>
                    <div class="space-y-5">
                        <div class="relative">
                            <div
                                id="humi-device-indicator"
                                class="-top-3 left-0 w-[2px] h-[50px] absolute bg-black transition-all duration-200"
                            ></div>

                            <div
                                class="w-full p-3 rounded-full bg-gradient-to-r from-green-500 via-yellow-300 to-red-600"
                            ></div>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-lg">Baik</span>
                            <span class="text-lg">Buruk</span>
                        </div>
                    </div>
                    <p class="text-center text-lg">Amonia (CH4) Saat ini</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
