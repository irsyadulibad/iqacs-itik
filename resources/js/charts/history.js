import { Chart, registerables } from "chart.js";
import { chartColors } from "../utils";

Chart.register(...registerables);
let charts = {};

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

function init(element) {
    // drawHistoryChart("history", element.dataset.type, element.dataset.unit)
    // setInterval(
    //     () =>
    //         drawHistoryChart(
    //             "history",
    //             element.dataset.type,
    //             element.dataset.unit,
    //         ),
    //     1000,
    // );
}

export { init };
