import "./bootstrap"
import "flowbite"
import $ from "jquery"
import { Chart, registerables } from "chart.js"

window.$ = $
window.jQuery = $

Chart.register(...registerables)

const tresholds = {
    temperature: {
        low: 20,
        high: 100,
    },
    humidity: {
        low: 20,
        high: 100,
    },
}

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

function updateQuality(selector, device, type) {
    $.ajax({
        url: `/device/${device}/quality`,
        data: {
            type,
        },
        success(res) {
            var percentage =
                ((parseFloat(res.data.value) - tresholds[type].low) /
                    (tresholds[type].high - tresholds[type].low)) *
                100

            const indicator = percentage < 0 ? 0 : percentage

            $(`#${selector}-indicator`).css("left", Math.round(indicator) + "%")
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

            updateQuality(selector, cEl.dataset.device, type)

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
