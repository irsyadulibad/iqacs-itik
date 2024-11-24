const chartColors = {
    temperature: {
        border: "rgba(75, 192, 192, 1)",
        background: "rgba(75, 192, 192, 0.2)",
    },
    humidity: {
        border: "rgba(3, 111, 252, 1)",
        background: "rgba(3, 111, 252, 0.2)",
    },
    ammonia: {
        border: "rgba(255, 99, 132, 1)",
        background: "rgba(255, 99, 132, 0.2)",
    },
}

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

export { chartColors, tresholds }
