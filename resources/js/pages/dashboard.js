function init() {
    const manualChecks = document.querySelectorAll('.manual-control')

    manualChecks.forEach((el) => {
        el.addEventListener('change', function (e) {
            fetch('/api/control/manual', {
                method: 'POST',
                body: JSON.stringify({
                    device_id: e.target.dataset.id,
                    state: e.target.checked,
                }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
                .then((res) => res.json())
                .then((res) => {
                    e.target.checked = e.target.checked
                })
                .catch((err) => {
                    e.target.checked = !e.target.checked
                })
        })
    })
}

export { init }
