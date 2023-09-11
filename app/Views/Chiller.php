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
                            <select id="bulanChiller" class="form-select form-select-md me-4 w-25  my-4 d-none">
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
                            <input type="number" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunChiller" placeholder="isi tahun ..." min="1000" max="9999" maxlength="4">
                        </div>


                        <canvas id="chartKerusakanChiller" class="d-none"></canvas>

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
                                Data Chiller 1
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
                            <div class="table-responsive">
                                <div class="card-body">
                                    <table id="example" class="display table table-bordered" style="width:100%">
                                        <thead class="thead-dark">
                                            <th>Status Chiller</th>
                                            <th>OUT Temperature</th>
                                            <th>IN Temperature</th>
                                            <th>Ambient Temperature</th>
                                            <th>FreeCooling Temperature</th>
                                            <th>Setpoint Medium</th>
                                            <th>Hydraulic Pump 1 speed</th>
                                            <th>Hydraulic Pump 2 speed</th>
                                            <th>Condensation Pressure 1</th>
                                            <th>Condensation Pressure 2</th>
                                            <th>Cooling Capacity</th>
                                            <th>Freecooling Capacity</th>
                                            <th>Hydr. Pressure (Suction)</th>
                                            <th>Hydr. Pressure (Discharge)</th>
                                            <th>Flow Rate</th>
                                            <th>Current Consumption</th>
                                            <th>Voltage</th>
                                            <th>Power Consumption</th>
                                            <th>EER</th>
                                            <th>Power Supply</th>
                                            <th>Alarm</th>
                                            <th>Alarm Message</th>
                                            <th>Kerusakan</th>
                                            <th>Keterangan</th>
                                            <th>Pemeriksa</th>
                                            <th>Waktu</th>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($chiller as $key => $post) : ?>

                                                <tr class="align-middle">
                                                    <td><?php echo $post['status_chiller1'] ?></td>
                                                    <td><?php echo $post['out_temp_chiller1'] ?>°C</td>
                                                    <td><?php echo $post['in_temp_chiller1'] ?>°C</td>
                                                    <td><?php echo $post['amb_temp_chiller1'] ?>°C</td>
                                                    <td><?php echo $post['free_temp_chiller1'] ?>°C</td>
                                                    <td><?php echo $post['setpoint_chiller1'] ?>°C</td>
                                                    <td><?php echo $post['pump1_chiller1'] ?>%</td>
                                                    <td><?php echo $post['pump2_chiller1'] ?>%</td>
                                                    <td><?php echo $post['conden1_chiller1'] ?> bar</td>
                                                    <td><?php echo $post['conden2_chiller1'] ?> bar</td>
                                                    <td><?php echo $post['cooling_chiller1'] ?> KW</td>
                                                    <td><?php echo $post['freecooling_chiller1'] ?> KW</td>
                                                    <td><?php echo $post['suction_chiller1'] ?> bar</td>
                                                    <td><?php echo $post['discharge_chiller1'] ?> bar</td>
                                                    <td><?php echo $post['flowrate_chiller1'] ?> l/min</td>
                                                    <td><?php echo $post['current_con_chiller1'] ?> Amp</td>
                                                    <td><?php echo $post['voltage_chiller1'] ?> Volt</td>
                                                    <td><?php echo $post['power_con_chiller1'] ?> KW</td>
                                                    <td><?php echo $post['eer_chiller1'] ?></td>
                                                    <td><?php echo $post['power_sup_chiller1'] ?></td>
                                                    <td><?php echo $post['alarm_chiller1'] ?></td>
                                                    <td><?php echo $post['message_chiller1'] ?></td>
                                                    <td><?php echo $post['rusak_chiller1'] ?></td>
                                                    <td><?php echo $post['alert_chiller1'] ?></td>
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
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- chart kerusakan -->
<script>
    const bulanSelect = document.getElementById('bulanChiller');
    const tahunSelect = document.getElementById('tahunChiller');
    const ctChiller = document.getElementById('chartKerusakanChiller').getContext('2d');
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

    const chartKerusakanChiller = new Chart(ctChiller, {
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
            const response = await fetch(`/chiller/getDataByMonth?bulanChiller=${selectedMonth}&tahunChiller=${selectedYear}`);
            if (response.ok) {
                const data = await response.json();
                console.log(data); // Tambahkan baris ini
                const labels = data.map(item => item.rusak_chiller1);
                const values = data.map(item => item.jumlah_kerusakan);
                chartKerusakanChiller.data.labels = labels;
                chartKerusakanChiller.data.datasets[0].data = values;
                chartKerusakanChiller.update();
            } else {
                console.error('Failed to fetch data:', response.status);
            }
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    bulanSelect.addEventListener('change', fetchChartData);
    tahunSelect.addEventListener('keyup', fetchChartData);
    fetchChartData();
</script>
<!-- Tombol Rusak -->
<script>
    document.getElementById('buttonRsk').addEventListener('click', function() {
        var canvas = document.getElementById('chartKerusakanChiller');
        var bulanChiller = document.getElementById('bulanChiller');
        var tahunChiller = document.getElementById('tahunChiller');
        canvas.classList.toggle('d-none');
        bulanChiller.classList.toggle('d-none');
        tahunChiller.classList.toggle('d-none');
    });
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
            labels: [], // Ini akan di-update dengan bulanChiller
            datasets: [] // Dataset akan di-update sesuai data
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Berdasarkan bulan Chiller'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets = [

            {
                label: 'OUT Temperature',
                data: data.map(item => item.out_temp_chiller1),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'IN Temperature',
                data: data.map(item => item.in_temp_chiller1),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Ambient Temperature',
                data: data.map(item => item.amb_temp_chiller1),
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'FreeCooling Temperature',
                data: data.map(item => item.free_temp_chiller1),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Setpoint Medium',
                data: data.map(item => item.setpoint_chiller1),
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Hydraulic Pump 1 speed',
                data: data.map(item => item.pump1_chiller1),
                borderColor: 'rgba(255, 159, 64, 1)',
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Hydraulic Pump 2 speed',
                data: data.map(item => item.pump2_chiller1),
                borderColor: 'rgba(128, 0, 128, 1)',
                backgroundColor: 'rgba(128, 0, 128, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Condensation Pressure 1',
                data: data.map(item => item.conden1_chiller1),
                borderColor: 'rgba(192, 192, 75, 1)',
                backgroundColor: 'rgba(192, 192, 75, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Condensation Pressure 2',
                data: data.map(item => item.conden2_chiller1),
                borderColor: 'rgba(0, 128, 128, 1)',
                backgroundColor: 'rgba(0, 128, 128, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Cooling Capacity',
                data: data.map(item => item.cooling_chiller1),
                borderColor: 'rgba(255, 0, 0, 1)',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Freecooling Capacity',
                data: data.map(item => item.freecooling_chiller1),
                borderColor: 'rgba(0, 255, 0, 1)',
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Hydr. Pressure (Suction)',
                data: data.map(item => item.suction_chiller1),
                borderColor: 'rgba(0, 0, 255, 1)',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Hydr. Pressure (Discharge)',
                data: data.map(item => item.discharge_chiller1),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Flow Rate',
                data: data.map(item => item.flowrate_chiller1),
                borderColor: 'rgba(192, 75, 192, 1)',
                backgroundColor: 'rgba(192, 75, 192, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Current Consumption',
                data: data.map(item => item.current_con_chiller1),
                borderColor: 'rgba(92, 192, 75, 1)',
                backgroundColor: 'rgba(92, 192, 75, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Voltage',
                data: data.map(item => item.voltage_chiller1),
                borderColor: 'rgba(75, 92, 192, 1)',
                backgroundColor: 'rgba(75, 92, 192, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Power Consumption',
                data: data.map(item => item.power_con_chiller1),
                borderColor: 'rgba(192, 92, 75, 1)',
                backgroundColor: 'rgba(192, 92, 75, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'EER',
                data: data.map(item => item.eer_chiller1),
                borderColor: 'rgba(145, 192, 75, 1)',
                backgroundColor: 'rgba(145, 192, 75, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
            },
            {
                label: 'Power Supply',
                data: data.map(item => item.power_sup_chiller1),
                borderColor: 'rgba(75, 145, 192, 1)',
                backgroundColor: 'rgba(75, 145, 192, 0.2)',
                pointRadius: 5,
                borderWidth: 1,
                fill: false,
                cubicInterpolationMode: 'monotone',
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
            const response = await fetch(`/chiller/getChartDataByMonth?bulanChiller=${selectedMonth}&tahunChiller=${selectedYear}`);
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
<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-chiller1') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>