<x-app-layout>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden border">
        <div class="bg-slate-100 px-4 py-3 border-b">
            <h3 class="text-md font-semibold text-gray-900">{{ $title }}</h3>
        </div>
        <div class="p-4">
            <div class="flex justify-end">
                <div
                    id="daterange"
                    class="py-1 px-3 bg-dprimary text-body font-semibold text-white rounded-md flex items-center space-x-2 min-w-44"
                >
                    <i class="ti ti-calendar-week text-lg"></i>
                    <span id="daterange-text" class="text-sm">-</span>
                </div>
            </div>

            <canvas
                id="history-chart"
                data-type="{{ $type }}"
                data-unit="{{ $unit }}"
            ></canvas>
        </div>
    </div>

    @push("script")
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"
        ></script>
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"
        ></script>
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
        ></script>
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
        />

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const cEl = document.getElementById(`history-chart`)
            const ctx = cEl.getContext('2d')
            const chartColors = {
                temperature: {
                    border: 'rgba(75, 192, 192, 1)',
                    background: 'rgba(75, 192, 192, 0.2)',
                },
                humidity: {
                    border: 'rgba(3, 111, 252, 1)',
                    background: 'rgba(3, 111, 252, 0.2)',
                },
                ammonia: {
                    border: 'rgba(255, 99, 132, 1)',
                    background: 'rgba(255, 99, 132, 0.2)',
                },
            }

            let startDate = moment().subtract(30, 'days')
            let endDate = moment()
            let label = '30 Hari Terakhir'
            let chart = null

            function drawChart(res, type, title) {
                const labels = res.data.map((item) => item.created_at)
                const values = res.data.map((item) => item.value)

                if (chart) {
                    chart.data.labels = labels
                    chart.data.datasets[0].data = values
                    chart.update()

                    return
                }

                chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: title,
                                data: values,
                                borderColor: chartColors[type].border,
                                backgroundColor: chartColors[type].background,
                                fill: true,
                                tension: 0.4,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                })
            }

            function loadData(start, end, tLabel) {
                const type = $('#history-chart').data('type')
                const unit = $('#history-chart').data('unit')

                if (tLabel == 'Custom Range')
                    label =
                        start.format('D MMMM, YYYY') +
                        ' - ' +
                        end.format('D MMMM, YYYY')

                startDate = start
                endDate = end
                label = tLabel

                $.ajax({
                    url: `/history/values`,
                    data: {
                        type,
                        unit,
                        start: start.format('YYYY-MM-DD'),
                        end: end.format('YYYY-MM-DD'),
                    },
                    success(res) {
                        drawChart(res, type, unit)
                    },
                })

                $('#daterange-text').text(label)
            }

            $('#daterange').daterangepicker(
                {
                    startDate,
                    endDate,
                    ranges: {
                        'Hari Ini': [moment(), moment()],
                        '7 Hari Terakhir': [
                            moment().subtract(6, 'days'),
                            moment(),
                        ],
                        '30 Hari Terakhir': [
                            moment().subtract(29, 'days'),
                            moment(),
                        ],
                        'Bulan Ini': [
                            moment().startOf('month'),
                            moment().endOf('month'),
                        ],
                    },
                },
                loadData,
            )

            loadData(startDate, endDate, label)
        </script>
    @endpush
</x-app-layout>
