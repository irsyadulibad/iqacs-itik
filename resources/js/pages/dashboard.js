import Swal from "sweetalert2"

function manualControl(elements) {
    elements.forEach((el) => {
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

function init() {
    const manualChecks = document.querySelectorAll('.manual-control')
    manualControl(manualChecks);

    $('.automatic-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/api/control/auto',
            method: 'POST',
            data: $(this).serialize(),
            success(res) {
                Swal.fire({
                    icon: 'success',
                    text: 'Berhasil menyimpan data otomatisasi',
                    timer: 1500,
                });
            },
        });
    });

    $('.automatic-delete').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: `/api/control/auto/${this.dataset.id}`,
            method: 'DELETE',
            success: (res) => {
                Swal.fire({
                    icon: 'success',
                    text: 'Berhasil menghapus data otomatisasi',
                    timer: 1500,
                });

                $(`#automatic-modal-${this.dataset.id} input[type=time]`).val('');
            },
        });
    });
}

export { init }
