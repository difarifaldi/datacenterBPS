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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Data berhasil disimpan !</strong> You should check in on some of those fields below.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                            Data Pemeriksa
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
                                        <tr>
                                            <th class="d-none"></th>
                                            <th class="d-none">No</th>
                                            <th>Jam</th>
                                            <th>Tanggal</th>
                                            <th>Pemeriksa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1 ;foreach ($pemeriksa as $key => $post) : ?>
                                            <tr class="align-middle">
                                                <td class="d-none"></td>
                                                <td class="d-none"><?php echo $no++ ?></td>
                                                <td><?php echo date('H:i', strtotime($post['jam'])) ?></td>
                                                <td><?php echo date('Y/m/d', strtotime($post['tanggal'])) ?></td>
                                                <td><?php echo $post['nama'] ?></td>
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
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-pemeriksa') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>
