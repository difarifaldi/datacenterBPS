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
                                    <strong>Data Vesda berhasil disimpan !</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo base_url('tabung/store') ?>" method="POST">
                                        <div class="col">
                                            <h5>Tabung Besar</h5>
                                            <label class="mt-2">Status Tekenan Besar</label>
                                            <select id="status_besar" class="form-select" name="status_besar" placeholder="Masukkan Status Tabung Besar">
                                            <option>Pilih Status</option>    
                                            <option value="Normal" <?= old('status_besar') === 'Normal' ? 'selected' : ''; ?>>Normal</option>
                                                <option value="Tidak Normal" <?= old('status_besar') === 'Tidak Normal' ? 'selected' : ''; ?>>Tidak Normal</option>
                                            </select>
                                            
                                            <div class="collapse mt-2" id="tabung_besar">
                                                <label class="mt-2">Keterangan</label>
                                                <input type="text" class="form-control <?= (validation_show_error('message_tabungBesar')) ? 'is-invalid' : ''; ?>" value="<?= empty(old('message_tabungBesar')) ? 'Tidak ada kerusakan' : old('message_tabungBesar'); ?>" name="message_tabungBesar" placeholder="Masukkan Keterangan Tabung Besar">
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('message_tabungBesar'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5>Tabung Kecil</h5>
                                            <label class="mt-2">Status Tekenan Kecil</label>
                                            <select id="status_kecil" class="form-select" name="status_kecil" placeholder="Masukkan Status Tabung Kecil">
                                            <option>Pilih Status</option> 
                                            <option value="Normal" <?= old('status_kecil') === 'Normal' ? 'selected' : ''; ?>>Normal</option>
                                                <option value="Tidak Normal" <?= old('status_kecil') === 'Tidak Normal' ? 'selected' : ''; ?>>Tidak Normal</option>
                                            </select>
                                            <div class="collapse mt-2" id="tabung_kecil">
                                                <label class="mt-2">Keterangan</label>
                                                <input type="text" class="form-control <?= (validation_show_error('message_tabungKecil')) ? 'is-invalid' : ''; ?>" value="<?= empty(old('message_tabungKecil')) ? 'Tidak ada kerusakan' : old('message_tabungKecil'); ?>" name="message_tabungKecil" placeholder="Masukkan Keterangan Tabung Besar">
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('message_tabungKecil'); ?>
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

<script>
    // Tabung Besar
    document.addEventListener("DOMContentLoaded", function() {
        const status_besar = document.getElementById("status_besar");
        const tabung_besar = document.getElementById("tabung_besar");

        status_besar.addEventListener("change", function() {
            if (status_besar.value === "Tidak Normal") {
                $(tabung_besar).collapse("show");
                const message_tabungBesar = document.getElementsByName("message_tabungBesar")[0];

                message_tabungBesar.value = "";
            } else if (status_besar.value === "Normal") {
                $(tabung_besar).collapse("hide");
                const message_tabungBesar = document.getElementsByName("message_tabungBesar")[0];

                message_tabungBesar.value = "Tidak ada kerusakan";
            }
        });
    });

    // Tabung Kecil
    document.addEventListener("DOMContentLoaded", function() {
        const status_kecil = document.getElementById("status_kecil");
        const tabung_kecil = document.getElementById("tabung_kecil");

        status_kecil.addEventListener("change", function() {
            if (status_kecil.value === "Tidak Normal") {
                $(tabung_kecil).collapse("show");
                const message_tabungKecil = document.getElementsByName("message_tabungKecil")[0];

                message_tabungKecil.value = "";
            } else {
                $(tabung_kecil).collapse("hide");
                const message_tabungKecil = document.getElementsByName("message_tabungKecil")[0];

                message_tabungKecil.value = "Tidak ada kerusakan";
            }
        });
    });
</script>

<?= $this->endSection() ?>