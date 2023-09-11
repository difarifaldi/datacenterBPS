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

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                        Fire System Monitoring Status Message
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
                            <table table id="example" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none">No</th>
                                        <th>Status</th>
                                        <th>Message</th>
                                        <th>Pemeriksa</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($fire as $key => $post) : ?>

                                        <tr>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td><?php echo $post['status'] ?></td>
                                            <td><?php echo $post['message_fire'] ?></td>
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
            </div>
        </main>
    </div>

<script>
    // Ekspor ke Excel saat tombol ditekan
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        window.location.href = '<?= site_url('export-fire') ?>'; // Menggunakan rute yang sudah didefinisikan
    });
</script>

<?= $this->endSection() ?>