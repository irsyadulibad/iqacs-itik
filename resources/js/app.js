import './bootstrap';
import 'flowbite';
import $ from 'jquery';
import { Chart, registerables } from 'chart.js';

window.$ = $;
window.jQuery = $;

Chart.register(...registerables);

let charts = {};

function updateQuality(selector, value) {
    console.log(selector, value);
}

function drawDeviceChart(selector, type, title, color) {
    const cEl = document.getElementById(`${selector}-chart`);
    const ctx = cEl.getContext('2d');

    $.ajax({
        url: `/device/${cEl.dataset.device}/value`,
        data: {
            type,
        },
        success(res) {
            const labels = res.data.map((item) => item.created_at);
            const values = res.data.map((item) => item.value);

            updateQuality(selector, values.slice(-1));

            if(charts[selector]) {
                charts[selector].data.labels = labels;
                charts[selector].data.datasets[0].data = values;
                charts[selector].update();

                return;
            }

            charts[selector] = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: title,
                        data: values,
                        borderColor: color.border,
                        backgroundColor: color.background,
                        fill: true,
                        tension: 0.4,
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                    },
                },
            });
        },
    })
}

function drawDeviceCharts() {
    drawDeviceChart('temp-device', 'temperature', 'Suhu', {
        border: 'rgba(75, 192, 192, 1)',
        background: 'rgba(75, 192, 192, 0.2)',
    });

    drawDeviceChart('humi-device', 'humidity', 'Kelembaban', {
        border: 'rgba(255, 99, 132, 1)',
        background: 'rgba(255, 99, 132, 0.2)',
    });
}

if(document.getElementById('temp-device-chart')) {
    drawDeviceCharts();
    setInterval(drawDeviceCharts, 30000);
}
