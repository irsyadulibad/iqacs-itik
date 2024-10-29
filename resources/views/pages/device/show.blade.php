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
    </div>
</x-app-layout>

{{--
    @push('script')
    <script>
    var ctxHumidity = document.getElementById("chartHumidity").getContext('2d');
    var chartHumidity = new Chart(ctxHumidity, {
    type: 'line',
    data: {
    labels: [],
    datasets: [{
    label: 'Humidity',
    data: [],
    borderColor: 'blue', // Warna garis biru
    borderWidth: 1,
    backgroundColor: 'rgba(0, 0, 255, 0.2)' // Warna background biru dengan transparansi
    }]
    },
    options: {
    scales: {
    xAxes: [{
    ticks: {
    beginAtZero: true
    }
    }],
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    
    
    var ctxTemperature = document.getElementById("chartTemperature").getContext('2d');
    var chartTemperature = new Chart(ctxTemperature, {
    type: 'line',
    data: {
    labels: [],
    datasets: [{
    label: 'Temperature',
    data: [],
    borderColor: 'purple', // Warna garis ungu
    borderWidth: 1,
    backgroundColor: 'rgba(128, 0, 128, 0.2)' // Warna background ungu dengan transparansi
    }]
    },
    options: {
    scales: {
    xAxes: [{
    ticks: {
    beginAtZero: true
    }
    }],
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    
    var updateChartHumidity = function() {
    $.ajax({
    url: "{{ route('api.charthumidity', ['id' => 1]) }}",
    type: 'GET',
    dataType: 'json',
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data) {
    // Update chart
    chartHumidity.data.labels = data.labels;
    chartHumidity.data.datasets[0].data = data.data;
    chartHumidity.update();
    
    // Update the latest value and last updated time
    var latestValue = data.latest.nilai_humidity;
    var lastUpdated = new Date(data.latest.created_at).toLocaleString();
    $('#latestValueHumidity').text(latestValue);
    $('#lastUpdatedHumidity').text('Terakhir update ' + lastUpdated);
    
    // Calculate percentage for the progress bar and needle position
    var minValue = 20; // Ganti dengan nilai minimum kadar metana
    var maxValue = 100; // Ganti dengan nilai maksimum kadar metana
    var percentage = ((latestValue - minValue) / (maxValue - minValue)) * 100;
    
    // Update the progress bar and needle position
    var progressFill = $('#progressFillHumidity');
    var progressNeedle = $('#progressNeedleHumidity');
    progressFill.css('width', percentage + '%');
    progressNeedle.css('left', percentage + '%');
    $('#percentageValueHumidity').text(percentage.toFixed(2) + '%');
    
    // Update the color of the small circle based on percentage
    var colorIndicator = $('#colorIndicatorHumidity');
    if (percentage <= 33) {
    colorIndicator.css('background-color', 'red');
    } else if (percentage <= 66) {
    colorIndicator.css('background-color', 'yellow');
    } else {
    colorIndicator.css('background-color', 'green');
    }
    },
    error: function(data) {
    console.log(data);
    }
    });
    }
    
    updateChartHumidity();
    // updateChartTemperature();
    </script>
    @endpush
--}}
