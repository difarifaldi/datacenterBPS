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
                                    <strong>Data Liquid Cooling Package berhasil disimpan !</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                      
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo base_url('vesda/store') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <h5>VESDA RUANG MAIN SERVER (VLP)</h5>
                                        <div class="form-group">
                                            <label>Status Vesda Main Server</label>
                                            <select  class="form-select" name="status_main">
                                                <option value="Ok" <?= old('status_main') === 'Ok' ? 'selected' : '';?>>Ok</option>
                                                <option value="Isolated" <?= old('status_main') === 'Isolated' ? 'selected' : '';?>>Isolated</option>
                                                <option value="Alert" <?= old('status_main') === 'Alert' ? 'selected' : '';?>>Alert</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            <?= validation_show_error('status_main'); ?>
                                        </div>
                                        <label class="mt-2">Kondisi Vesda Main Server</label>
                                        <select id="alert_vesda" class="form-select" name="alert_vesdaMain">
                                            <option value="Normal" <?= old('alert_vesdaMain') === 'Normal' ? 'selected' : '';?>>Normal</option>
                                            <option value="Alarm ON" <?= old('alert_vesdaMain') === 'Alarm ON' ? 'selected' : '';?>>Alarm ON</option>
                                            <option value="Perbaikan" <?= old('alert_vesdaMain') === 'Perbaikan' ? 'selected' : '';?>>Perbaikan</option>
                                            <option value="Mati" <?= old('alert_vesdaMain') === 'Mati' ? 'selected' : '';?>>Mati</option>
                                        </select>
                                        <div class="collapse mt-2" id="additional_info">
                                        <label class="mt-2">Alarm Message Main Server</label>
                                        <input type="text" class="form-control" id="message_vesda" name="message_vesdaMain" placeholder="Masukkan Alarm Message Main Server" value="<?= old('message_vesdaMain'); ?>">
                                        </div>
                                        </div>
                                    <br>
                                    <h5>VESDA SELASAR/LORONG (VLP)</h5>
                                    <div class="form-group">
                                            <label>Status Vesda Selasar (Lorong)</label>
                                            <select  class="form-select" name="status_selasar">
                                                <option value="Ok" <?= old('status_selasar') === 'Ok' ? 'selected' : '';?>>Ok</option>
                                                <option value="Isolated" <?= old('status_selasar') === 'Isolated' ? 'selected' : '';?>>Isolated</option>
                                                <option value="Alert" <?= old('status_selasar') === 'Alert' ? 'selected' : '';?>>Alert</option>
                                            </select>
                                        <label class="mt-2">Kondisi Vesda Selasar (Lorong)</label>
                                        <select id="alert_vesda2" class="form-select" name="alert_vesdaSelasar">
                                            <option value="Normal" <?= old('alert_vesdaSelasar') === 'Normal' ? 'selected' : '';?>>Normal</option>
                                            <option value="Alarm ON" <?= old('alert_vesdaSelasar') === 'Alarm ON' ? 'selected' : '';?>>Alarm ON</option>
                                            <option value="Perbaikan" <?= old('alert_vesdaSelasar') === 'Perbaikan' ? 'selected' : '';?>>Perbaikan</option>
                                            <option value="Mati" <?= old('alert_vesdaSelasar') === 'Mati' ? 'selected' : '';?>>Mati</option>
                                        </select>
                                        <div class="collapse mt-2" id="additional_info2">
                                        <label class="mt-2">Alarm Message Main Server</label>
                                        <input type="text" class="form-control" id="message_vesda" name="message_vesdaSelasar" placeholder="Masukkan Alarm Message Selasar (Lorong)" value="<?= old('message_vesdaSelasar'); ?>">
                                        </div>
                                        </div>
                                    <br>
                                    <h5>VESDA UTILITY (VLC)</h5>
                                        <div class="form-group">
                                            <label>Status Vesda Utility</label>
                                            <select  class="form-select" name="status_utility">
                                                <option value="Ok" <?= old('status_utility') === 'Ok' ? 'selected' : '';?>>Ok</option>
                                                <option value="Isolated" <?= old('status_utility') === 'Isolated' ? 'selected' : '';?>>Isolated</option>
                                                <option value="Alert" <?= old('status_utility') === 'Alert' ? 'selected' : '';?>>Alert</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            <?= validation_show_error('status_utility'); ?>
                                        </div>
                                        <label class="mt-2">Kondisi Vesda Utility</label>
                                        <select id="alert_vesda3" class="form-select" name="alert_vesdaUtility">
                                            <option value="Normal" <?= old('alert_vesdaUtility') === 'Normal' ? 'selected' : '';?>>Normal</option>
                                            <option value="Alarm ON" <?= old('alert_vesdaUtility') === 'Alarm ON' ? 'selected' : '';?>>Alarm ON</option>
                                            <option value="Perbaikan" <?= old('alert_vesdaUtility') === 'Perbaikan' ? 'selected' : '';?>>Perbaikan</option>
                                            <option value="Mati" <?= old('alert_vesdaUtility') === 'Mati' ? 'selected' : '';?>>Mati</option>
                                        </select>
                                        <div class="collapse mt-2" id="additional_info3">
                                        <label class="mt-2">Alarm Message Utility</label>
                                        <input type="text" class="form-control" id="message_vesda" name="message_vesdaUtility" placeholder="Masukkan Alarm Message Utility" value="<?= old('message_vesdaUtility'); ?>">
                                        </div>
                                        </div>
                                    <br>
                                    <h5>VESDA TAPE LIBRARY (VLC)</h5>
                                        <div class="form-group">
                                            <label>Status Vesda Tape Library</label>
                                            <select  class="form-select" name="status_library">
                                                <option value="Ok" <?= old('status_library') === 'Ok' ? 'selected' : '';?>>Ok</option>
                                                <option value="Isolated" <?= old('status_library') === 'Isolated' ? 'selected' : '';?>>Isolated</option>
                                                <option value="Alert" <?= old('status_library') === 'Alert' ? 'selected' : '';?>>Alert</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            <?= validation_show_error('status_library'); ?>
                                        </div>
                                        <label class="mt-2">Kondisi Vesda Tape Library</label>
                                        <select id="alert_vesda4" class="form-select" name="alert_vesdaLibrary">
                                            <option value="Normal" <?= old('alert_vesdaLibrary') === 'Normal' ? 'selected' : '';?>>Normal</option>
                                            <option value="Alarm ON" <?= old('alert_vesdaLibrary') === 'Alarm ON' ? 'selected' : '';?>>Alarm ON</option>
                                            <option value="Perbaikan" <?= old('alert_vesdaLibrary') === 'Perbaikan' ? 'selected' : '';?>>Perbaikan</option>
                                            <option value="Mati" <?= old('alert_vesdaLibrary') === 'Mati' ? 'selected' : '';?>>Mati</option>
                                        </select>
                                        <div class="collapse mt-2" id="additional_info4">
                                        <label class="mt-2">Alarm Message Tape Library</label>
                                        <input type="text" class="form-control" id="message_vesda" name="message_vesdaLibrary" placeholder="Masukkan Alarm Message Tape Library" value="<?= old('message_vesdaLibrary'); ?>">
                                        </div>
                                        </div>
                                    <br>
                                    <h5>VESDA STAGING (VLC)</h5>
                                        <div class="form-group">
                                            <label>Status Vesda Staging</label>
                                            <select  class="form-select" name="status_staging">
                                                <option value="Ok" <?= old('status_staging') === 'Ok' ? 'selected' : '';?>>Ok</option>
                                                <option value="Isolated" <?= old('status_staging') === 'Isolated' ? 'selected' : '';?>>Isolated</option>
                                                <option value="Alert" <?= old('status_staging') === 'Alert' ? 'selected' : '';?>>Alert</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            <?= validation_show_error('status_staging'); ?>
                                        </div>
                                        <label class="mt-2">Kondisi Vesda Staging</label>
                                        <select id="alert_vesda5" class="form-select" name="alert_vesdaStaging">
                                            <option value="Normal" <?= old('alert_vesdaStaging') === 'Normal' ? 'selected' : '';?>>Normal</option>
                                            <option value="Alarm ON" <?= old('alert_vesdaStaging') === 'Alarm ON' ? 'selected' : '';?>>Alarm ON</option>
                                            <option value="Perbaikan" <?= old('alert_vesdaStaging') === 'Perbaikan' ? 'selected' : '';?>>Perbaikan</option>
                                            <option value="Mati" <?= old('alert_vesdaStaging') === 'Mati' ? 'selected' : '';?>>Mati</option>
                                        </select>
                                        <div class="collapse mt-2" id="additional_info5">
                                        <label class="mt-2">Alarm Message Staging</label>
                                        <input type="text" class="form-control" id="message_vesda" name="message_vesdaStaging" placeholder="Masukkan Alarm Message Staging" value="<?= old('message_vesdaStaging'); ?>">
                                        </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">SIMPAN</button>
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
    document.addEventListener("DOMContentLoaded", function() {
        const alertSelect = document.getElementById("alert_vesda");
        const alertSelect2 = document.getElementById("alert_vesda2");
        const alertSelect3 = document.getElementById("alert_vesda3");
        const alertSelect4 = document.getElementById("alert_vesda4");
        const alertSelect5 = document.getElementById("alert_vesda5");
        const additionalInfoDiv = document.getElementById("additional_info");
        const additionalInfoDiv2 = document.getElementById("additional_info2");
        const additionalInfoDiv3 = document.getElementById("additional_info3");
        const additionalInfoDiv4 = document.getElementById("additional_info4");
        const additionalInfoDiv5 = document.getElementById("additional_info5");

        alertSelect.addEventListener("change", function() {
            if (alertSelect.value === "Alarm ON") {
                $(additionalInfoDiv).collapse("show");
            } else {
                $(additionalInfoDiv).collapse("hide");
            }
        });
        alertSelect2.addEventListener("change", function() {
            if (alertSelect2.value === "Alarm ON") {
                $(additionalInfoDiv2).collapse("show");
            } else {
                $(additionalInfoDiv2).collapse("hide");
            }
        });
        alertSelect3.addEventListener("change", function() {
            if (alertSelect3.value === "Alarm ON") {
                $(additionalInfoDiv3).collapse("show");
            } else {
                $(additionalInfoDiv3).collapse("hide");
            }
        });
        alertSelect4.addEventListener("change", function() {
            if (alertSelect4.value === "Alarm ON") {
                $(additionalInfoDiv4).collapse("show");
            } else {
                $(additionalInfoDiv4).collapse("hide");
            }
        });
        alertSelect5.addEventListener("change", function() {
            if (alertSelect5.value === "Alarm ON") {
                $(additionalInfoDiv5).collapse("show");
            } else {
                $(additionalInfoDiv5).collapse("hide");
            }
        });
    });
</script>
<?= $this->endSection() ?>