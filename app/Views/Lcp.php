<?= $this->extend('main') ?>
<?= $this->extend('navbar') ?>

<?= $this->section('content') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if(!empty(session()->getFlashdata('message'))) : ?>

                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('message');?>
                            </div>
                                
                            <?php endif ?>

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
                                        Data Liquid Cooling Package (LCP)
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
                                                <th colspan="4" class="text-center">LCP 1</th>
                                                <th colspan="4" class="text-center">LCP 2</th>
                                                <th colspan="4" class="text-center">LCP 3</th>
                                                <th colspan="4" class="text-center">LCP 4</th>
                                                <th colspan="4" class="text-center">LCP 5</th>
                                                <th colspan="4" class="text-center">LCP 6</th>
                                                <th colspan="4" class="text-center">LCP 7</th>
                                                <th colspan="4" class="text-center">LCP 8</th>
                                                <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                                <th rowspan="2" class="text-center align-middle">Waktu</th>
                                                <tr class="thead-dark text-center">
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>Suhu</th>
                                                    <th>Daya</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                </tr>                                    
                                            </thead>
                                            <tbody>
                                                <?php foreach($lcp as $key => $post) : ?>

                                                    <tr class="align-middle">
                                                        <td><?php echo $post['suhu_lcp1'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp1'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp1'] ?></td>
                                                        <td><?php echo $post['message_lcp1'] ?></td>
                                                        <td><?php echo $post['suhu_lcp2'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp2'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp2'] ?></td>
                                                        <td><?php echo $post['message_lcp2'] ?></td>
                                                        <td><?php echo $post['suhu_lcp3'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp3'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp3'] ?></td>
                                                        <td><?php echo $post['message_lcp3'] ?></td>
                                                        <td><?php echo $post['suhu_lcp4'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp4'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp4'] ?></td>
                                                        <td><?php echo $post['message_lcp4'] ?></td>
                                                        <td><?php echo $post['suhu_lcp5'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp5'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp5'] ?></td>
                                                        <td><?php echo $post['message_lcp5'] ?></td>
                                                        <td><?php echo $post['suhu_lcp6'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp6'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp6'] ?></td>
                                                        <td><?php echo $post['message_lcp6'] ?></td>
                                                        <td><?php echo $post['suhu_lcp7'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp7'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp7'] ?></td>
                                                        <td><?php echo $post['message_lcp7'] ?></td>
                                                        <td><?php echo $post['suhu_lcp8'] ?> °C</td>
                                                        <td><?php echo $post['daya_lcp8'] ?> kW</td>
                                                        <td><?php echo $post['alert_lcp8'] ?></td>
                                                        <td><?php echo $post['message_lcp8'] ?></td>
                                                        <td><?php echo $post['pemeriksa_nama'] ?></td>
                                                        <td><?php echo date('Y/m/d', strtotime($post['pemeriksa_tanggal']))."  ".date('H:i', strtotime($post['pemeriksa_jam']))?></td>
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
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                    text: 'Grafik Berdasarkan bulan IPDU'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets= [{
                    label: 'Suhu LCP 1',
                    data: data.map(item => item.suhu_lcp1),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 2',
                    data: data.map(item => item.suhu_lcp2),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 3',
                    data: data.map(item => item.suhu_lcp3),
                    borderColor: 'rgba(128, 0, 128, 1)', // Warna garis ungu
                    backgroundColor: 'rgba(128, 0, 128, 0.2)', // Warna latar belakang ungu dengan transparansi
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 4',
                    data: data.map(item => item.suhu_lcp4),
                    borderColor: 'rgba(192, 192, 75, 1)',
                    backgroundColor: 'rgba(192, 192, 75, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 5',
                    data: data.map(item => item.suhu_lcp5),
                    borderColor: 'rgba(0, 128, 0, 1)',
                    backgroundColor: 'rgba(0, 128, 0, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 6',
                    data: data.map(item => item.suhu_lcp6),
                    borderColor: 'rgba(75, 145, 192, 1)',
                    backgroundColor: 'rgba(75, 145, 192, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 7',
                    data: data.map(item => item.suhu_lcp7),
                    borderColor: 'rgba(192, 75, 145, 1)',
                    backgroundColor: 'rgba(192, 75, 145, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Suhu LCP 8',
                    data: data.map(item => item.suhu_lcp8),
                    borderColor: 'rgba(235, 87, 59, 1)',
                    backgroundColor: 'rgba(235, 87, 59, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 1',
                    data: data.map(item => item.daya_lcp1),
                    borderColor: 'rgba(59, 235, 87, 1)',
                    backgroundColor: 'rgba(59, 235, 87, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 2',
                    data: data.map(item => item.daya_lcp2),
                    borderColor: 'rgba(87, 59, 235, 1)',
                    backgroundColor: 'rgba(87, 59, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 3',
                    data: data.map(item => item.daya_lcp3),
                    borderColor: 'rgba(235, 59, 87, 1)',
                    backgroundColor: 'rgba(235, 59, 87, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 4',
                    data: data.map(item => item.daya_lcp4),
                    borderColor: 'rgba(87, 235, 59, 1)',
                    backgroundColor: 'rgba(87, 235, 59, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 5',
                    data: data.map(item => item.daya_lcp5),
                    borderColor: 'rgba(59, 87, 235, 1)',
                    backgroundColor: 'rgba(59, 87, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 6',
                    data: data.map(item => item.daya_lcp6),
                    borderColor: 'rgba(180, 59, 235, 1)',
                    backgroundColor: 'rgba(180, 59, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 7',
                    data: data.map(item => item.daya_lcp7),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Daya LCP 8',
                    data: data.map(item => item.daya_lcp8),
                    borderColor: 'rgba(145, 192, 75, 1)',
                    backgroundColor: 'rgba(145, 192, 75, 0.2)',
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
            const response = await fetch(`/lcp/getChartDataByMonth?bulanLcp=${selectedMonth}&tahunLcp=${selectedYear}`);
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
        window.location.href = '<?= site_url('export-lcp') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>
