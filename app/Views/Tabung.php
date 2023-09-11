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
                            <select id="bulanLine" class="form-select form-select-md w-25 d-none mt-4" name="bulanLine">
                                <?php for ($i = 1; $i <= 12; $i++) : ?>
                                    <option value="<?= date('F', mktime(0, 0, 0, $i, 1)); ?>"><?= date('F', mktime(0, 0, 0, $i, 1)); ?></option>
                                <?php endfor; ?>
                            </select>
                            <canvas id="lineChart" class="d-none"></canvas>

                            <div class="card mt-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                        Data Tabung
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
                                        <th colspan="2" class="text-center">Tabung Tekanan Besar</th>
                                        <th colspan="2" class="text-center">Tabung Tekanan Kecil</th>
                                        <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                        <th rowspan="2" class="text-center align-middle">Waktu</th>
                                        <tr class="thead-dark text-center">
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                        </tr>                                    
                                    </thead>
                                    <tbody>
                                        <?php foreach($tabung as $key => $post) : ?>

                                            <tr class="align-middle">
                                                <td><?php echo $post['status_besar'] ?></td>
                                                <td><?php echo $post['message_tabungBesar'] ?></td>
                                                <td><?php echo $post['status_kecil'] ?></td>
                                                <td><?php echo $post['message_tabungKecil'] ?></td>
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
            labels: [], // Ini akan di-update dengan bulanTabung
            datasets: [] // Dataset akan di-update sesuai data
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Berdasarkan bulan Tabung'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets= [
            
    {
        label: 'Status Tabung Tekanan Besar',
        data: data.map(item => item.status_besar),
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        pointRadius: 5,
        borderWidth: 1,
        fill: false,
        cubicInterpolationMode: 'monotone',
    },
    {
        label: 'Status Tabung Tekanan Kecil',
        data: data.map(item => item.status_kecil),
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
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

bulanLineSelect.addEventListener('change', async function() {
    const selectedMonth = bulanLineSelect.value;

    try {
        const response = await fetch(`/tabung/getChartDataByMonth?bulanTabung=${selectedMonth}`);
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
});

// Pembaruan awal saat halaman dimuat
bulanLineSelect.dispatchEvent(new Event('change'));
</script>

<script>
    document.getElementById('toggleChartButton').addEventListener('click', function() {
        var canvas = document.getElementById('lineChart');
        var bulanLine = document.getElementById('bulanLine');
        canvas.classList.toggle('d-none');
        bulanLine.classList.toggle('d-none');



    });
</script>

<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-tabung') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>


<?= $this->endSection() ?>