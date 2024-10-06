<x-panel-layout>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2">
            <div class="bg-white shadow-lg rounded-lg mb-4">
                <div
                    class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
                    <h6 class="m-0 font-semibold text-gray-700">Dashboard</h6>
                </div>
                <div class="px-4 pb-4">
                    <canvas id="chartTemperature"></canvas>
                </div>
            </div>
        </div>
        <div class="pb-4">
            <div
                class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                <div class="flex justify-between w-full mb-6 items-center">
                    <p class="text-white text-sm font-bold">Temperature (CH4)</p>
                    <div class="flex items-center">
                        <div id="colorIndicatorTemperature" class="w-3 h-3 rounded-full mr-2"></div>
                        <p class="text-white text-sm" id="percentageValueTemperature"></p>
                    </div>
                </div>

                <div class="progress-container">
                    <div id="progressFillTemperature" class="progress-bar-fill"></div>
                    <div id="progressNeedleTemperature" class="progress-needle"></div>
                </div>

                <div class="flex justify-between w-full mb-6">
                    <p class="text-white text-sm">Buruk</p>
                    <p class="text-white text-sm">Baik</p>
                </div>

                <p class="text-white text-sm">Temperature (CH4)</p>
                <p class="text-white text-sm">Saat ini</p>
                <div id="latestValueTemperature" class="text-white text-5xl font-bold mb-4"></div>
                <p id="lastUpdatedTemperature" class="text-white text-sm"></p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2">
            <div class="bg-white shadow-lg rounded-lg mb-4">
                <div
                    class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
                    <h6 class="m-0 font-semibold text-gray-700">Dashboard</h6>
                </div>
                <div class="px-4 pb-4">
                    <canvas id="chartHumidity"></canvas>
                </div>
            </div>
        </div>
        <div class="pb-4">
            <div
                class="bg-dgreen h-full px-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                <div class="flex justify-between w-full mb-6 items-center">
                    <p class="text-white text-sm font-bold">Humidity (CH4)</p>
                    <div class="flex items-center">
                        <div id="colorIndicatorHumidity" class="w-3 h-3 rounded-full mr-2"></div>
                        <p class="text-white text-sm" id="percentageValueHumidity"></p>
                    </div>
                </div>

                <div class="progress-container">
                    <div id="progressFillHumidity" class="progress-bar-fill"></div>
                    <div id="progressNeedleHumidity" class="progress-needle"></div>
                </div>

                <div class="flex justify-between w-full mb-6">
                    <p class="text-white text-sm">Buruk</p>
                    <p class="text-white text-sm">Baik</p>
                </div>

                <p class="text-white text-sm">Humidity (CH4)</p>
                <p class="text-white text-sm">Saat ini</p>
                <div id="latestValueHumidity" class="text-white text-5xl font-bold mb-4"></div>
                <p id="lastUpdatedHumidity" class="text-white text-sm"></p>
            </div>
        </div>
    </div>

    @push('style')
    <style>
        .progress-container {
            position: relative;
            width: 100%;
            height: 20px;
            background: linear-gradient(to right, red, yellow, green);
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .progress-bar-fill {
            height: 100%;
            width: 0;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .progress-needle {
            position: absolute;
            top: -10px;
            width: 2px;
            height: 40px;
            background: black;
            transition: left 0.5s;
        }
    </style>
    @endpush

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
</x-panel-layout>
