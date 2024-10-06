<x-panel-layout>
    <div class="gap-4">
        <div class="bg-white shadow-lg rounded-lg mb-4">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h6 class="m-0 font-semibold text-gray-700">Dashboard</h6>
            </div>
            <div class="px-8 py-8">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('dashboard.detail', ['id' => 1]) }}" class="col-span-1">
                        <div
                            class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                            <div class="w-full mb-6 items-center mt-4">
                                <p class="text-white text-lg font-bold">Lokasi Alat 1</p>
                                <p class="text-white text-sm font-bold">Keterangan Lokasi:</p>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Suhu</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Temperature1->isNotEmpty())
                                                @foreach ($Temperature1 as $temperature)
                                                    {{ $temperature->nilai_suhu }} C
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Temperature data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Kelembapan</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Humidity1->isNotEmpty())
                                                @foreach ($Humidity1 as $humidity)
                                                    {{ $humidity->nilai_humidity }} %
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Humidity data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('dashboard.detail', ['id' => 2]) }}" class="col-span-1">
                        <div
                            class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                            <div class="w-full mb-6 items-center mt-4">
                                <p class="text-white text-lg font-bold">Lokasi Alat 2</p>
                                <p class="text-white text-sm font-bold">Keterangan Lokasi:</p>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Suhu</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Temperature2->isNotEmpty())
                                                @foreach ($Temperature2 as $temperature)
                                                    {{ $temperature->nilai_suhu }} C
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Temperature data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Kelembapan</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Humidity2->isNotEmpty())
                                                @foreach ($Humidity2 as $humidity)
                                                    {{ $humidity->nilai_humidity }} %
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Humidity data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <a href="{{ route('dashboard.detail', ['id' => 3]) }}" class="col-span-1">
                        <div
                            class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                            <div class="w-full mb-6 items-center mt-4">
                                <p class="text-white text-lg font-bold">Lokasi Alat 3</p>
                                <p class="text-white text-sm font-bold">Keterangan Lokasi:</p>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Suhu</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Temperature3->isNotEmpty())
                                                @foreach ($Temperature3 as $temperature)
                                                    {{ $temperature->nilai_suhu }} C
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Temperature data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Kelembapan</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Humidity3->isNotEmpty())
                                                @foreach ($Humidity3 as $humidity)
                                                    {{ $humidity->nilai_humidity }} %
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Humidity data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.detail', ['id' => 4]) }}" class="col-span-1">
                        <div class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                            <div class="w-full mb-6 items-center mt-4">
                                <p class="text-white text-lg font-bold">Lokasi Alat 4</p>
                                <p class="text-white text-sm font-bold">Keterangan Lokasi:</p>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Suhu</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Temperature4->isNotEmpty())
                                                @foreach ($Temperature4 as $temperature)
                                                    {{ $temperature->nilai_suhu }} C
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Temperature data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-6">
                                <div class="flex justify-between">
                                    <div class="flex w-full">
                                        <p class="text-white text-md font-bold w-1/3">Kelembapan</p>
                                        <p class="text-white text-md font-bold w-1/6">:</p>
                                        <p class="text-white text-md font-bold w-1/2">
                                            @if ($Humidity4->isNotEmpty())
                                                @foreach ($Humidity4 as $humidity)
                                                    {{ $humidity->nilai_humidity }} %
                                                @endforeach
                                            @else
                                                <p class="text-red-500">No Humidity data available.</p>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-panel-layout>
