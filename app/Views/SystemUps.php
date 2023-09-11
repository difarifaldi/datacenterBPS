<?= $this->extend('main') ?>
<?= $this->extend('navbar') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        <?php if (!empty(session()->getFlashdata('message'))) : ?>

                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('message'); ?>
                            </div>

                        <?php endif ?>

                        <!-- grafik rusak -->
                        <button id="buttonRsk" class="btn btn-primary mt-3">Lihat Grafik Kerusakan</button>

                        <div class="d-flex">
                            <select id="bulanSystemUPS" class="form-select form-select-md me-4 w-25  my-4 d-none">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <input type="number" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunSystemUPS" placeholder="isi tahun ..." min="1000" max="9999" maxlength="4">
                        </div>
                        <canvas id="chartKerusakanSystemUPS" class="d-none"></canvas>


                        <!-- grafik seluruh -->
                        <button id="toggleChartButton" class="btn btn-primary mt-3">Lihat Grafik Data</button>
                        <div class="d-flex">
                            <select id="bulanLine" class="form-select form-select-md me-4 w-25  my-4 d-none" name="bulanLine">
                                <?php for ($i = 1; $i <= 12; $i++) : ?>
                                    <option value="<?= date('F', mktime(0, 0, 0, $i, 1)); ?>"><?= date('F', mktime(0, 0, 0, $i, 1)); ?></option>
                                <?php endfor; ?>
                            </select>
                            <input type="number" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunLine" placeholder="isi tahun ..." min="1000" max="9999" maxlength="4">
                        </div>

                        <canvas id="lineChart" class="d-none"></canvas>

                        <div class="card my-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data System UPS
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="entries" class="mt-3 text-start ms-3">
                                        <!-- Show entries element will be inserted here -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="search-container" class="mt-3 text-end me-3">
                                        <label for="search-input">Search:</label>
                                        <input type="search" id="search-input">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="thead-dark text-center">
                                                <th>Status UPS</th>
                                                <th>Load Presentasi L1</th>
                                                <th>Load Presentasi L2</th>
                                                <th>Load Presentasi L3</th>
                                                <th>Batery Voltage</th>
                                                <th>Temp</th>
                                                <th>Time</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Pemeriksa</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($systemups as $key => $post) : ?>

                                                <tr class="align-middle">
                                                    <td><?php echo $post['status_ups'] ?></td>
                                                    <td><?php echo $post['load_pl1'] ?>%</td>
                                                    <td><?php echo $post['load_pl2'] ?>%</td>
                                                    <td><?php echo $post['load_pl3'] ?>%</td>
                                                    <td><?php echo $post['batery_voltage'] ?> Volt</td>
                                                    <td><?php echo $post['temp'] ?>°C</td>
                                                    <td><?php echo $post['time'] ?> Minutes</td>
                                                    <td><?php echo $post['alert_systemups'] ?></td>
                                                    <td><?php echo $post['message_systemups'] ?></td>
                                                    <td><?php echo $post['rusak_systemups'] ?></td>
                                                    <td><?php echo $post['pemeriksa_nama'] ?></td>
                                                    <td><?php echo date('Y/m/d', strtotime($post['pemeriksa_tanggal'])) . "  " . date('H:i', strtotime($post['pemeriksa_jam'])) ?></td>

                                                </tr>

                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="pagination" class="dataTables_wrapper dataTables_paginate paginate_button mb-3">
                                <!-- Pagination element will be inserted here -->
                            </div>
                        </div>
                        <button id="exportExcelButton" class="btn btn-primary mt-3 mb-3">Export to Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- chart kerusakan -->
<script>
    const bulanSelect = document.getElementById('bulanSystemUPS');
    const tahunSelect = document.getElementById('tahunSystemUPS');
    const ctSystemUPS = document.getElementById('chartKerusakanSystemUPS').getContext('2d');
    // Palet warna yang akan digunakan
    const colorPalette = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)'
    ];

    // Mengatur properti backgroundColor pada dataset dengan warna dari palet
    const datasets = [{
        label: 'Jumlah Kerusakan',
        data: [], // Data jumlah kerusakan akan di-update
        backgroundColor: colorPalette, // Menggunakan palet warna
        borderColor: colorPalette.map(color => color.replace('0.2', '1')), // Warna tepi menggunakan versi yang lebih gelap dari palet
        borderWidth: 1
    }];

    const chartKerusakanSystemUPS = new Chart(ctSystemUPS, {
        type: 'bar',
        data: {
            labels: [], // Data labels akan di-update
            datasets: datasets
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Jumlah Kerusakan berdasarkan Tipe'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    });


    async function fetchChartData() {
        const selectedMonth = bulanSelect.value;
        const selectedYear = tahunSelect.value;
        try {
            const response = await fetch(`/systemups/getDataByMonth?bulanSystemUPS=${selectedMonth}&tahunSystemUPS=${selectedYear}`);
            if (response.ok) {
                const data = await response.json();
                console.log(data); // Tambahkan baris ini
                const labels = data.map(item => item.rusak_systemups);
                const values = data.map(item => item.jumlah_kerusakan);
                chartKerusakanSystemUPS.data.labels = labels;
                chartKerusakanSystemUPS.data.datasets[0].data = values;
                chartKerusakanSystemUPS.update();
            } else {
                console.error('Failed to fetch data:', response.status);
            }
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    bulanSelect.addEventListener('change', fetchChartData);
    tahunSelect.addEventListener('keyup', fetchChartData);
    tahunSelect.addEventListener('click', fetchChartData);
    fetchChartData();
</script>

<!-- Chart menyeluruh -->
<script>
    // Mengambil data dari PHP
    var chartData = <?php echo json_encode($chartData) ?>;

    // Mengambil elemen canvas
    var cty = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(cty, {
        type: 'line',
        data: {
            labels: [], // Ini akan di-update dengan bulanSystemUPS-bulanSystemUPS
            datasets: [] // Dataset akan di-update sesuai data
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Berdasarkan bulanSystemUPS'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets = [{
                label: 'Load PL1',
                data: data.map(item => item.load_pl1),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: 'Load PL2',
                data: data.map(item => item.load_pl2),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: 'Load PL3',
                data: data.map(item => item.load_pl3),
                borderColor: 'rgba(255, 205, 86, 1)', // Contoh warna kuning
                backgroundColor: 'rgba(255, 205, 86, 0.2)', // Contoh warna kuning dengan transparansi
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: 'Batery Voltage',
                data: data.map(item => item.batery_voltage),
                borderColor: 'rgba(75, 192, 192, 1)', // Contoh warna cyan
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Contoh warna cyan dengan transparansi
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: 'Temp',
                data: data.map(item => item.temp),
                borderColor: 'rgba(153, 102, 255, 1)', // Contoh warna ungu
                backgroundColor: 'rgba(153, 102, 255, 0.2)', // Contoh warna ungu dengan transparansi
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: 'Time',
                data: data.map(item => item.time),
                borderColor: 'rgba(59, 235, 180, 1)',
                backgroundColor: 'rgba(59, 235, 180, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone'
            }
        ];


        lineChart.data.labels = labels;
        lineChart.data.datasets = datasets;
        lineChart.update();
    }
    const bulanLineSelect = document.getElementById('bulanLine');
    const tahunLineSelect = document.getElementById('tahunLine');
    async function fetchChartData() {
        const selectedMonth = bulanLineSelect.value;
        const selectedYear = tahunLineSelect.value;
        try {
            const response = await fetch(`/systemups/getChartDataByMonth?bulanSystemUPS=${selectedMonth}&tahunSystemUPS=${selectedYear}`);
            if (response.ok) {
                const data = await response.json();
                console.log(data);
                updateLineChart(data);
            } else {
                console.error('Gagal mengambil data:', response.status);
            }
        } catch (error) {
            console.error('Terjadi kesalahan:', error);
        }
    }

    bulanLineSelect.addEventListener('change', fetchChartData);
    tahunLineSelect.addEventListener('keyup', fetchChartData);
    tahunLineSelect.addEventListener('click', fetchChartData);



    fetchChartData();
</script>

<!-- tombol menyeluruh -->
<script>
    document.getElementById('toggleChartButton').addEventListener('click', function() {
        var canvas = document.getElementById('lineChart');
        var bulanLine = document.getElementById('bulanLine');
        var tahunLine = document.getElementById('tahunLine');
        canvas.classList.toggle('d-none');
        tahunLine.classList.toggle('d-none');
        bulanLine.classList.toggle('d-none');


    });
</script>

<!-- tombol rusak -->
<script>
    document.getElementById('buttonRsk').addEventListener('click', function() {
        var canvas = document.getElementById('chartKerusakanSystemUPS');
        var bulanSystemUPS = document.getElementById('bulanSystemUPS');
        var tahunSystemUPS = document.getElementById('tahunSystemUPS');
        canvas.classList.toggle('d-none');
        bulanSystemUPS.classList.toggle('d-none');
        tahunSystemUPS.classList.toggle('d-none');


    });
</script>

<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-systemups') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>