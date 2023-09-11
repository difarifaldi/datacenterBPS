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
                            <input type="text" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunLine" placeholder="isi tahun ..." oninput="validateInput(this)" min="1000" max="9999" maxlength="4">
                        </div>

                        <canvas id="lineChart" class="d-none"></canvas>

                            <div class="card mt-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                        Data Status CCTV
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
                                        <th colspan="3" class="text-center">CCTV</th>
                                        <th rowspan="2" class="text-center align-middle">Status Network Video Recorder (NVR)</th>
                                        <th rowspan="2" class="text-center align-middle">Status Record</th>
                                        <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                        <th rowspan="2" class="text-center align-middle">Waktu</th>
                                        <tr class="thead-dark text-center">
                                            <th>Unit CCTV</th>
                                            <th>Status CCTV</th>
                                            <th>Keterangan CCTV</th>
                                        </tr>                                    
                                    </thead>
                                    <tbody>
                                        <?php foreach($cctv as $key => $post) : ?>

                                            <tr class="align-middle">
                                                <td><?php echo $post['unit_cctv'] ?></td>
                                                <td><?php echo $post['status_cctv'] ?></td>
                                                <td><?php echo $post['keterangan_cctv'] ?></td>
                                                <td><?php echo $post['status_nvr'] ?></td>
                                                <td><?php echo $post['record'] ?></td>
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

    <!-- Untuk input angka tahun grafik -->
    <script>
        function validateInput(input) {
        // Hapus karakter selain angka
        input.value = input.value.replace(/\D/g, '');

        // Batasi panjang input menjadi 4 karakter
        if (input.value.length > 4) {
            input.value = input.value.slice(0, 4);
        }
        }
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
            labels: [], // Ini akan di-update dengan bulanTabung
            datasets: [] // Dataset akan di-update sesuai data
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Berdasarkan bulan | Status CCTV'
                }
            },
        }
    });
    // Fungsi untuk mengisi data LineChart
    function updateLineChart(data) {
        const labels = data.map(item => item.tanggal); // Menggunakan tanggal sebagai label
        const datasets= [
            
    {
        label: 'Unit CCTV',
        data: data.map(item => item.unit_cctv),
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
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
            const response = await fetch(`/cctv/getChartDataByMonth?bulanCctv=${selectedMonth}&tahunCctv=${selectedYear}`);
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
        window.location.href = '<?= site_url('export-cctv') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>


<?= $this->endSection() ?>