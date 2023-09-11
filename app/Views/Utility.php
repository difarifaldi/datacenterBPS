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
                            
                            <div class="card mt-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                        Data Ruang Utility (Panel)
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
                                            <th colspan="10" class="text-center">Utility</th>
                                            <th colspan="5" class="text-center">Staging</th>
                                            <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                            <th rowspan="2" class="text-center align-middle">Waktu</th>
                                            <tr class="thead text-center">
                                                <th class="text-center">MSB</th>
                                                <th class="text-center">MSB</th>
                                                <th class="text-center">MSB</th>
                                                <th class="text-center">Keterangan MSB</th>
                                                <th class="text-center">Alarm Message MSB</th>
                                                <th class="text-center">UMSB</th>
                                                <th class="text-center">UMSB</th>
                                                <th class="text-center">UMSB</th>
                                                <th class="text-center">Keterangan UMSB</th>
                                                <th class="text-center">Alarm Message UMSB</th>
                                                <th class="text-center">DB-UPS</th>
                                                <th class="text-center">DB-UPS</th>
                                                <th class="text-center">DB-UPS</th>
                                                <th class="text-center">Keterangan DB-UPS</th>
                                                <th class="text-center">Alarm Message DB-UPS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php foreach ($utility as $post) : ?>
                                               
                                                <tr class="align-middle">

                                                    <td><?php echo $post['MSB_U'] ?> kW</td>
                                                    <td><?php echo $post['MSB_U2'] ?> kvar</td>
                                                    <td><?php echo $post['MSB_U3'] ?> kVA</td>
                                                    <td><?php echo $post['alert_MSBU'] ?></td>
                                                    <td><?php echo $post['message_MSBU'] ?></td>
                                                    <td><?php echo $post['UMSB_U'] ?> kW</td>
                                                    <td><?php echo $post['UMSB_U2'] ?> kvar</td>
                                                    <td><?php echo $post['UMSB_U3'] ?> kVA</td>
                                                    <td><?php echo $post['alert_UMSBU'] ?></td>
                                                    <td><?php echo $post['message_UMSBU'] ?></td>
                                                    <td><?php echo $post['MSB_S'] ?> kW</td>
                                                    <td><?php echo $post['MSB_S2'] ?> kvar</td>
                                                    <td><?php echo $post['MSB_S3'] ?> kVA</td>
                                                    <td><?php echo $post['alert_MSBS'] ?></td>
                                                    <td><?php echo $post['message_MSBS'] ?></td>
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
                    text: 'Grafik Berdasarkan bulan Utility'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets= [
            
    {
        label: 'MSB Utility',
        data: data.map(item => item.MSB_U),
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'UMSB Utility',
        data: data.map(item => item.UMSB_U),
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'MSB Utility ke-2',
        data: data.map(item => item.MSB_U2),
        borderColor: 'rgba(255, 206, 86, 1)',
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'UMSB Utility ke-2',
        data: data.map(item => item.UMSB_U2),
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'MSB Utility ke-3',
        data: data.map(item => item.MSB_U3),
        borderColor: 'rgba(153, 102, 255, 1)',
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'UMSB Utility ke-3',
        data: data.map(item => item.UMSB_U3),
        borderColor: 'rgba(255, 159, 64, 1)',
        backgroundColor: 'rgba(255, 159, 64, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'DB-UPS',
        data: data.map(item => item.MSB_S),
        borderColor: 'rgba(128, 0, 128, 1)',
        backgroundColor: 'rgba(128, 0, 128, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'DB-UPS',
        data: data.map(item => item.MSB_S2),
        borderColor: 'rgba(0, 128, 128, 1)',
        backgroundColor: 'rgba(0, 128, 128, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'DB-UPS',
        data: data.map(item => item.MSB_S3),
        borderColor: 'rgba(0, 255, 0, 1)',
        backgroundColor: 'rgba(0, 255, 0, 0.2)',
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
            const response = await fetch(`/utility/getChartDataByMonth?bulanUtility=${selectedMonth}&tahunUtility=${selectedYear}`);
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
        window.location.href = '<?= site_url('export-utility') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>