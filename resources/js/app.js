import "./bootstrap"
import "flowbite"
import $ from "jquery"
import { Chart, registerables } from "chart.js"

window.$ = $
window.jQuery = $

Chart.register(...registerables)

const chartColors = {
    temperature: {
        border: "rgba(75, 192, 192, 1)",
        background: "rgba(75, 192, 192, 0.2)",
    },
    humidity: {
        border: "rgba(255, 99, 132, 1)",
        background: "rgba(255, 99, 132, 0.2)",
    },
}

let charts = {}

function updateQuality(selector, value) {
    const cEl = document.getElementById(`${selector}-indacator`)
    $.ajax({
        url: "{{ route('api.charthumidity', ['id' => 1]) }}",
        type: "GET",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            // Update chart
            chartHumidity.data.labels = data.labels
            chartHumidity.data.datasets[0].data = data.data
            chartHumidity.update()

            // Update the latest value and last updated time
            var latestValue = data.latest.nilai_humidity
            var lastUpdated = new Date(data.latest.created_at).toLocaleString()
            $("#latestValueHumidity").text(latestValue)
            $("#lastUpdatedHumidity").text("Terakhir update " + lastUpdated)

            // Calculate percentage for the progress bar and needle position
            var minValue = 20 // Ganti dengan nilai minimum kadar metana
            var maxValue = 100 // Ganti dengan nilai maksimum kadar metana
            var percentage =
                ((latestValue - minValue) / (maxValue - minValue)) * 100

            // Update the progress bar and needle position
            var progressFill = $("#progressFillHumidity")
            var progressNeedle = $("#progressNeedleHumidity")
            progressFill.css("width", percentage + "%")
            progressNeedle.css("left", percentage + "%")
            $("#percentageValueHumidity").text(percentage.toFixed(2) + "%")

            // Update the color of the small circle based on percentage
            var colorIndicator = $("#colorIndicatorHumidity")
            if (percentage <= 33) {
                colorIndicator.css("background-color", "red")
            } else if (percentage <= 66) {
                colorIndicator.css("background-color", "yellow")
            } else {
                colorIndicator.css("background-color", "green")
            }
        },
        error: function (data) {
            console.log(data)
        },
    })
}

function drawDeviceChart(selector, type, title) {
    const cEl = document.getElementById(`${selector}-chart`)
    const ctx = cEl.getContext("2d")

    $.ajax({
        url: `/device/${cEl.dataset.device}/value`,
        data: {
            type,
        },
        success(res) {
            const labels = res.data.map((item) => item.created_at)
            const values = res.data.map((item) => item.value)

            updateQuality(selector, values.slice(-1))

            if (charts[selector]) {
                charts[selector].data.labels = labels
                charts[selector].data.datasets[0].data = values
                charts[selector].update()

                return
            }

            charts[selector] = new Chart(ctx, {
                type: "line",
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
        },
    })
}

function drawDeviceCharts() {
    drawDeviceChart("temp-device", "temperature", "Suhu")
    drawDeviceChart("humi-device", "humidity", "Kelembaban")
}

if (document.getElementById("temp-device-chart")) {
    drawDeviceCharts()
    setInterval(drawDeviceCharts, 30000)
}

function drawHistoryChart(selector, type, title) {
    const cEl = document.getElementById(`${selector}-chart`)
    const ctx = cEl.getContext("2d")

    $.ajax({
        url: `/history/values`,
        data: {
            type,
        },
        success(res) {
            const labels = res.data.map((item) => item.created_at)
            const values = res.data.map((item) => item.value)

            if (charts[selector]) {
                charts[selector].data.labels = labels
                charts[selector].data.datasets[0].data = values
                charts[selector].update()

                return
            }

            charts[selector] = new Chart(ctx, {
                type: "line",
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
        },
    })
}

const hsChartEl = document.getElementById("history-chart")

if (hsChartEl) {
    drawHistoryChart("history", hsChartEl.dataset.type, hsChartEl.dataset.unit)
    setInterval(
        () =>
            drawHistoryChart(
                "history",
                hsChartEl.dataset.type,
                hsChartEl.dataset.unit,
            ),
        1000,
    )
}
