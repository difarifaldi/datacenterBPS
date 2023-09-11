
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
                                        Data Integrated Power Distribution Unit (IPDU)
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
                                            <thead class="thead-dark">
                                                <th colspan="9" class="text-center">Main Breaker 1</th>
                                                <th colspan="9" class="text-center">Main Breaker 2</th>
                                                <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                                <th rowspan="2" class="text-center align-middle">Waktu</th>
                                                <tr>
                                                    <th>P</th>
                                                    <th>S</th>
                                                    <th>Q</th>
                                                    <th>PF</th>
                                                    <th>KWH</th>
                                                    <th>KVah</th>
                                                    <th>KVarh</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                    <th>P</th>
                                                    <th>S</th>
                                                    <th>Q</th>
                                                    <th>PF</th>
                                                    <th>KWH</th>
                                                    <th>KVah</th>
                                                    <th>KVarh</th>
                                                    <th>Keterangan</th>
                                                    <th>Alarm Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($ipdu as $key => $post) : ?>

                                                    <tr class="align-middle">
                                                        <td><?php echo $post['p_mb1'] ?> kW</td>
                                                        <td><?php echo $post['s_mb1'] ?> kVA</td>
                                                        <td><?php echo $post['q_mb1'] ?> kvar</td>
                                                        <td><?php echo $post['pf_mb1'] ?></td>
                                                        <td><?php echo $post['kwh_mb1'] ?></td>
                                                        <td><?php echo $post['kvah_mb1'] ?></td>
                                                        <td><?php echo $post['kvarh_mb1'] ?></td>
                                                        <td><?php echo $post['alert_ipdu1'] ?></td>
                                                        <td><?php echo $post['message_ipdu1'] ?></td>
                                                        <td><?php echo $post['p_mb2'] ?> kW</td>
                                                        <td><?php echo $post['s_mb2'] ?> kVA</td>
                                                        <td><?php echo $post['q_mb2'] ?> kvar</td>
                                                        <td><?php echo $post['pf_mb2'] ?></td>
                                                        <td><?php echo $post['kwh_mb2'] ?></td>
                                                        <td><?php echo $post['kvah_mb2'] ?></td>
                                                        <td><?php echo $post['kvarh_mb2'] ?></td>
                                                        <td><?php echo $post['alert_ipdu2'] ?></td>
                                                        <td><?php echo $post['message_ipdu2'] ?></td>
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
                    </div>
                </div>
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
                    label: 'P MB-1',
                    data: data.map(item => item.p_mb1),                  borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'S MB-1',
                    data: data.map(item => item.s_mb1),                  borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Q MB-1',
                    data: data.map(item => item.q_mb1),                  borderColor: 'rgba(128, 0, 128, 1)', // Warna garis ungu
                    backgroundColor: 'rgba(128, 0, 128, 0.2)', // Warna latar belakang ungu dengan transparansi
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'PF MB-1',
                    data: data.map(item => item.pf_mb1),                   borderColor: 'rgba(192, 192, 75, 1)',
                    backgroundColor: 'rgba(192, 192, 75, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KWH MB-1',
                    data: data.map(item => item.kwh_mb1),                    borderColor: 'rgba(0, 128, 0, 1)',
                    backgroundColor: 'rgba(0, 128, 0, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KVah MB-1',
                    data: data.map(item => item.kvah_mb1),
                    borderColor: 'rgba(75, 145, 192, 1)',
                    backgroundColor: 'rgba(75, 145, 192, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KVarh MB-1',
                    data: data.map(item => item.kvarh_mb1),
                    borderColor: 'rgba(192, 75, 145, 1)',
                    backgroundColor: 'rgba(192, 75, 145, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'P MB-2',
                    data: data.map(item => item.p_mb2),                  borderColor: 'rgba(235, 87, 59, 1)',
                    backgroundColor: 'rgba(235, 87, 59, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'S MB-2',
                    data: data.map(item => item.s_mb2),                  borderColor: 'rgba(59, 235, 87, 1)',
                    backgroundColor: 'rgba(59, 235, 87, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'Q MB-2',
                    data: data.map(item => item.q_mb2),                  borderColor: 'rgba(87, 59, 235, 1)',
                    backgroundColor: 'rgba(87, 59, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'PF MB-2',
                    data: data.map(item => item.pf_mb2),                   borderColor: 'rgba(235, 59, 87, 1)',
                    backgroundColor: 'rgba(235, 59, 87, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KWH MB-2',
                    data: data.map(item => item.kwh_mb2),                    borderColor: 'rgba(87, 235, 59, 1)',
                    backgroundColor: 'rgba(87, 235, 59, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KVah MB-2',
                    data: data.map(item => item.kvah_mb2),
                    borderColor: 'rgba(59, 87, 235, 1)',
                    backgroundColor: 'rgba(59, 87, 235, 0.2)',
                    pointRadius: 5,
                    borderWidth: 1,
                    fill: false,
                    cubicInterpolationMode: 'monotone',
                },
                {
                    label: 'KVarh MB-2',
                    data: data.map(item => item.kvarh_mb2),
                    borderColor: 'rgba(180, 59, 235, 1)',
                    backgroundColor: 'rgba(180, 59, 235, 0.2)',
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
            const response = await fetch(`/ipdu/getChartDataByMonth?bulanIpdu=${selectedMonth}&tahunIpdu=${selectedYear}`);
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
        window.location.href = '<?= site_url('export-ipdu') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>