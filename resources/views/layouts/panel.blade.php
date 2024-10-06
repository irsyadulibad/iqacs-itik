<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @vite('resources/css/app.css')

    @stack('style')
</head>

<body class="flex flex-col h-screen" style="background-color: #f3f4f6;">
    <div class="flex h-screen">
        <x-panel.sidebar/>

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-panel.navbar/>

            <main class="flex-1 overflow-y-auto p-4">
                {{ $slot }}
            </main>
            <footer class="bg-white border-t border-gray-200 p-4 shadow-md mt-auto">
                <div class="flex items-center justify-center">
                    <p class="text-sm text-gray-500">&copy; Gumukmas Multifarm</p>
                </div>
            </footer>
            <form id="logout-form" action="#" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="logout" value="true">
            </form>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#export-btn').click(function() {
                var start = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var end = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                window.location.href = '{{ route('export.ammonia') }}?createFrom=' + start + '&createTo=' +
                    end;
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            var start_date = moment().subtract(6, 'days');
            var end_date = moment();

            // Variabel untuk menyimpan referensi chart
            var myChart = null;

            $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

            // Fungsi untuk memperbarui chart
            function updateChart(labels, data) {
                var ctx = document.getElementById('myChart').getContext('2d');

                // Hancurkan chart lama jika ada
                if (myChart !== null) {
                    myChart.destroy();
                }

                // Buat chart baru
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Amonia Levels',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Fungsi untuk mendapatkan data berdasarkan rentang tanggal
            function fetchData(start, end) {
                $.ajax({
                    url: '{{ route('data.riwayatamonia') }}',
                    method: 'POST',
                    data: {
                        createFrom: start.format('YYYY-MM-DD'),
                        createTo: end.format('YYYY-MM-DD'),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        updateChart(response.labels, response.data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Panggil fetchData saat halaman pertama kali dimuat
            fetchData(start_date, end_date);

            $('#daterange').daterangepicker({
                startDate: start_date,
                endDate: end_date,
                locale: {
                    format: 'MMMM D, YYYY'
                }
            }, function(start, end) {
                $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
                fetchData(start, end);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var dropdown = document.getElementById('profileDropdown');

        function toggleDropdown(event) {
            event.stopPropagation();
            dropdown.classList.toggle('hidden');
        }
        document.body.addEventListener('click', function(event) {
            if (!event.target.closest('#profileDropdown') && !event.target.closest(
                    'button[onclick="toggleDropdown(event)"]')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

    @stack('script')
</body>

</html>
