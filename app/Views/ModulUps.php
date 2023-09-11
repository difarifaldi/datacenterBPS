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
                            <select id="bulanModulUps" class="form-select form-select-md me-4 w-25  my-4 d-none">
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
                            <input type="number" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunModulUps" placeholder="isi tahun ..." min="1000" max="9999" maxlength="4">
                        </div>

                        <canvas id="chartKerusakanModulUps" class="d-none"></canvas>

                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Modul UPS
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
                                            <th colspan="4" class="text-center">Modul UPS 1</th>
                                            <th colspan="4" class="text-center">Modul UPS 2</th>
                                            <th colspan="4" class="text-center">Modul UPS 3</th>
                                            <th colspan="4" class="text-center">Modul UPS 4</th>
                                            <th colspan="4" class="text-center">Modul UPS 5</th>
                                            <th colspan="4" class="text-center">Modul UPS 6</th>
                                            <th colspan="4" class="text-center">Modul UPS 7</th>
                                            <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                            <th rowspan="2" class="text-center align-middle">Waktu</th>
                                            <tr class="thead-dark text-center">
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($modulups as $key => $post) : ?>
                                                <tr class="align-middle">
                                                    <td><?php echo $post['statusups1'] ?></td>
                                                    <td><?php echo $post['alert_modulups1'] ?></td>
                                                    <td><?php echo $post['message_modulups1'] ?></td>
                                                    <td><?php echo $post['rusak_modulups1'] ?></td>
                                                    <td><?php echo $post['statusups2'] ?></td>
                                                    <td><?php echo $post['alert_modulups2'] ?></td>
                                                    <td><?php echo $post['message_modulups2'] ?></td>
                                                    <td><?php echo $post['rusak_modulups2'] ?></td>
                                                    <td><?php echo $post['statusups3'] ?></td>
                                                    <td><?php echo $post['alert_modulups3'] ?></td>
                                                    <td><?php echo $post['message_modulups3'] ?></td>
                                                    <td><?php echo $post['rusak_modulups3'] ?></td>
                                                    <td><?php echo $post['statusups4'] ?></td>
                                                    <td><?php echo $post['alert_modulups4'] ?></td>
                                                    <td><?php echo $post['message_modulups4'] ?></td>
                                                    <td><?php echo $post['rusak_modulups4'] ?></td>
                                                    <td><?php echo $post['statusups5'] ?></td>
                                                    <td><?php echo $post['alert_modulups5'] ?></td>
                                                    <td><?php echo $post['message_modulups5'] ?></td>
                                                    <td><?php echo $post['rusak_modulups5'] ?></td>
                                                    <td><?php echo $post['statusups6'] ?></td>
                                                    <td><?php echo $post['alert_modulups6'] ?></td>
                                                    <td><?php echo $post['message_modulups6'] ?></td>
                                                    <td><?php echo $post['rusak_modulups6'] ?></td>
                                                    <td><?php echo $post['statusups7'] ?></td>
                                                    <td><?php echo $post['alert_modulups7'] ?></td>
                                                    <td><?php echo $post['message_modulups7'] ?></td>
                                                    <td><?php echo $post['rusak_modulups7'] ?></td>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
            },
            dom: '<"top"i>rt<"bottom"lp><"clear">'
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- untuk grafik kerusakan -->
<script>
    const bulanSelect = document.getElementById('bulanModulUps');
    const tahunSelect = document.getElementById('tahunModulUps');
    const ctModulUps = document.getElementById('chartKerusakanModulUps').getContext('2d');
    const colorPalette = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(107, 56, 255, 0.2)',
        'rgba(107, 56, 255, 0.2)',
    ];

    const datasets = [];
    const customLabels = ["Kipas", "Kompresor", "Instalasi Pipa", "Head Assanger"];

    for (let i = 1; i <= 7; i++) {
        datasets.push({
            label: `Jumlah Kerusakan ModulUps ${i}`,
            data: Array(5).fill(0),
            backgroundColor: colorPalette[i - 1],
            borderColor: colorPalette[i - 1].replace('0.2', '1'),
            borderWidth: 1
        });
    }

    const chartKerusakanModulUps = new Chart(ctModulUps, {
        type: 'bar',
        data: {
            labels: customLabels,
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
            const response = await fetch(`/modulups/getDataByMonth?bulanModulUps=${selectedMonth}&tahunModulUps=${selectedYear}`);

            if (response.ok) {
                const data = await response.json();
                console.log(data);

                // Mengosongkan data awal dataset
                datasets.forEach(dataset => {
                    dataset.data = Array(customLabels.length).fill(0);
                });

                data.forEach(item => {
                    // Loop melalui setiap jenis rusak_ModulUps
                    for (let i = 1; i <= 6; i++) {
                        const rusakKey = `rusak_modulups${i}`;
                        const jumlahKerusakanKey = `jumlah_kerusakan_modulups${i}`;

                        // Periksa jika jenis rusak_ModulUps sesuai dengan label yang ada
                        if (customLabels.includes(item[rusakKey])) {
                            const labelIndex = customLabels.indexOf(item[rusakKey]);
                            datasets[i - 1].data[labelIndex] += parseInt(item[jumlahKerusakanKey]);
                        }
                    }
                });

                chartKerusakanModulUps.update();
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

<script>
    document.getElementById('buttonRsk').addEventListener('click', function() {
        var canvas = document.getElementById('chartKerusakanModulUps');
        var bulanModulUps = document.getElementById('bulanModulUps');
        var tahunModulUps = document.getElementById('tahunModulUps');
        canvas.classList.toggle('d-none');
        tahunModulUps.classList.toggle('d-none');
        bulanModulUps.classList.toggle('d-none');


    });
</script>

<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-modulups') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>