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
                            <select id="bulanPac" class="form-select form-select-md me-4 w-25  my-4 d-none">
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
                            <input type="number" class="form-control form-control-md h-50 w-25 my-4 d-none" id="tahunPac" placeholder="isi tahun ..." min="1000" max="9999" maxlength="4">
                        </div>

                        <canvas id="chartKerusakanPac" class="d-none"></canvas>




                        <div class="card my-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data PAC
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
                                            <th colspan="6" class="text-center">PAC 1</th>
                                            <th colspan="6" class="text-center">PAC 2</th>
                                            <th colspan="6" class="text-center">PAC 3</th>
                                            <th colspan="6" class="text-center">PAC 4</th>
                                            <th colspan="6" class="text-center">PAC 5</th>
                                            <th colspan="6" class="text-center">PAC 6</th>
                                            <th rowspan="2" class="text-center align-middle">Pemeriksa</th>
                                            <th rowspan="2" class="text-center align-middle">Waktu</th>
                                            <tr>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                                <th>Status</th>
                                                <th>Suhu</th>
                                                <th>Temperature</th>
                                                <th>Keterangan</th>
                                                <th>Alarm Message</th>
                                                <th>Kerusakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pac as $key => $post) : ?>

                                                <tr class="align-middle">
                                                    <td><?php echo $post['status_pac1'] ?></td>
                                                    <td><?php echo $post['suhu_pac1'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac1'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac1'] ?></td>
                                                    <td><?php echo $post['message_pac1'] ?></td>
                                                    <td><?php echo $post['rusak_pac1'] ?></td>
                                                    <td><?php echo $post['status_pac2'] ?></td>
                                                    <td><?php echo $post['suhu_pac2'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac2'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac2'] ?></td>
                                                    <td><?php echo $post['message_pac2'] ?></td>
                                                    <td><?php echo $post['rusak_pac2'] ?></td>
                                                    <td><?php echo $post['status_pac3'] ?></td>
                                                    <td><?php echo $post['suhu_pac3'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac3'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac3'] ?></td>
                                                    <td><?php echo $post['message_pac3'] ?></td>
                                                    <td><?php echo $post['rusak_pac3'] ?></td>
                                                    <td><?php echo $post['status_pac4'] ?></td>
                                                    <td><?php echo $post['suhu_pac4'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac4'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac4'] ?></td>
                                                    <td><?php echo $post['message_pac4'] ?></td>
                                                    <td><?php echo $post['rusak_pac4'] ?></td>
                                                    <td><?php echo $post['status_pac5'] ?></td>
                                                    <td><?php echo $post['suhu_pac5'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac5'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac5'] ?></td>
                                                    <td><?php echo $post['message_pac5'] ?></td>
                                                    <td><?php echo $post['rusak_pac5'] ?></td>
                                                    <td><?php echo $post['status_pac6'] ?></td>
                                                    <td><?php echo $post['suhu_pac6'] ?> °C</td>
                                                    <td><?php echo $post['temp_pac6'] ?> RH</td>
                                                    <td><?php echo $post['alert_pac6'] ?></td>
                                                    <td><?php echo $post['message_pac6'] ?></td>
                                                    <td><?php echo $post['rusak_pac6'] ?></td>
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
<script>
    const bulanSelect = document.getElementById('bulanPac');
    const tahunSelect = document.getElementById('tahunPac');
    const ctPac = document.getElementById('chartKerusakanPac').getContext('2d');
    const colorPalette = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(107, 56, 255, 0.2)',
    ];

    const datasets = [];
    const customLabels = ["Tidak Rusak", "Kipas", "Kompresor", "Instalasi Pipa", "Head Assanger"];

    for (let i = 1; i <= 6; i++) {
        datasets.push({
            label: `Jumlah Kerusakan PAC ${i}`,
            data: Array(5).fill(0),
            backgroundColor: colorPalette[i - 1],
            borderColor: colorPalette[i - 1].replace('0.2', '1'),
            borderWidth: 1
        });
    }

    const chartKerusakanPac = new Chart(ctPac, {
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
            const response = await fetch(`/pac/getDataByMonth?bulanPac=${selectedMonth}&tahunPac=${selectedYear}`);

            if (response.ok) {
                const data = await response.json();
                console.log(data);

                // Mengosongkan data awal dataset
                datasets.forEach(dataset => {
                    dataset.data = Array(customLabels.length).fill(0);
                });

                data.forEach(item => {
                    // Loop melalui setiap jenis rusak_pac
                    for (let i = 1; i <= 6; i++) {
                        const rusakKey = `rusak_pac${i}`;
                        const jumlahKerusakanKey = `jumlah_kerusakan_pac${i}`;

                        // Periksa jika jenis rusak_pac sesuai dengan label yang ada
                        if (customLabels.includes(item[rusakKey])) {
                            const labelIndex = customLabels.indexOf(item[rusakKey]);
                            datasets[i - 1].data[labelIndex] += parseInt(item[jumlahKerusakanKey]);
                        }
                    }
                });

                chartKerusakanPac.update();
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
        var canvas = document.getElementById('chartKerusakanPac');
        var bulanPac = document.getElementById('bulanPac');
        var tahunPac = document.getElementById('tahunPac');
        canvas.classList.toggle('d-none');
        tahunPac.classList.toggle('d-none');
        bulanPac.classList.toggle('d-none');


    });
</script>

<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-pac') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>