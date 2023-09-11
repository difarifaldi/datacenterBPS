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
                                    <strong>Data Tabung berhasil disimpan !</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                            <?php if(isset($validation)) { ?>
                            <?php } ?>
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo base_url('fire/store') ?>" method="POST">
                                    <h5>FIRE SYSTEM MONITORING STATUS MESSAGE</h5>
                                        <div class="form-group mt-4">
                                            <label>Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Normal">Normal</option>
                                                <option value="System Trouble">System Trouble</option>
                                                <option value="Alarm">Alarm</option>
                                            </select>
                                            <label class="mt-2">Alarm Message</label>
                                            <input type="text" class="form-control" id="message_fire" name="message_fire" placeholder="Masukkan Alarm Message">
                                        </div>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?= $this->endSection() ?>