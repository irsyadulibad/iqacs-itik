import { Chart, registerables } from "chart.js"
import { chartColors, tresholds } from "../utils"

Chart.register(...registerables)

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

            let indicator = percentage < 0 ? 0 : percentage

            if(indicator > 100) indicator = 100;

            $(`#${selector}-value`).html(res.data.value);
            $(`#${selector}-time`).html(`Terakhir update ${res.data.created_at}`);
            $(`#${selector}-indicator`).css("left", Math.round(indicator) + "%");
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
            const labels = res.data.map((item) => item.label)
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
    drawDeviceChart("ammo-device", "ammonia", "Amonia")
}

function init() {
    drawDeviceCharts()
    setInterval(drawDeviceCharts, 30000)
}

export { init };
