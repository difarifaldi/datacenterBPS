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

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Peringatan! </strong> <?php echo session()->getFlashdata('message');?> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
    
<?php endif ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5>PEMERIKSA</h5>
                                    <form action="/pemeriksa/store" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="form-group mt-5">
                                        <label>Jam</label>
                                        <input type="TIME" class="form-control <?= (validation_show_error('jam')) ? 'is-invalid' : ''; ?>" name="jam" placeholder="Masukkan Jam" value="<?= old('jam'); ?>">

                                        <div class="invalid-feedback">
                                            <?= validation_show_error('jam'); ?>
                                        </div>

                                    </div>


                                    <div class="form-group mt-3">
                                        <label>Tanggal</label>
                                        <input type="DATE" class="form-control <?= (validation_show_error('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" placeholder="Masukkan Tanggal" value="<?= old('tanggal'); ?>">

                                        <div class="invalid-feedback">
                                            <?= validation_show_error('tanggal'); ?>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="nama">Nama Pemeriksa</label>

                                        <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">


                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nama'); ?>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-primary mt-5">SIMPAN</button>
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