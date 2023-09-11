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
                                    <strong>Data Ruang Utility(Panel) berhasil disimpan !</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                        <div class="card">
                            <div class="card-body">
                                <h5>SYSTEM UPS</h5>
                                <form action="<?php echo base_url('systemups/store') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="form-group mt-4">
                                        <label>Status UPS</label>
                                        <select id="status_ups" class="form-control" name="status_ups" placeholder="Masukkan Status UPS">
                                            <option value="On Battery">On Battery</option>
                                            <option value="Bypass">Bypass</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Load Presentasi L1</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('load_pl1')) ? 'is-invalid' : ''; ?>" name="load_pl1" value="<?= old('load_pl1'); ?>" placeholder="Masukkan Load Presentasi L1">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('load_pl1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Load Presentasi L2</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('load_pl2')) ? 'is-invalid' : ''; ?>" name="load_pl2" value="<?= old('load_pl2'); ?>" placeholder="Masukkan Load Presentasi L2">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('load_pl2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Load Presentasi L3</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('load_pl3')) ? 'is-invalid' : ''; ?>" name="load_pl3" value="<?= old('load_pl3'); ?>" placeholder="Masukkan Load Presentasi L3">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('load_pl3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Battery Voltage</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('batery_voltage')) ? 'is-invalid' : ''; ?>" name="batery_voltage" value="<?= old('batery_voltage'); ?>" placeholder="Masukkan Battery Voltage">
                                            <span class="input-group-text">Volt</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('batery_voltage'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Temp</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp')) ? 'is-invalid' : ''; ?>" name="temp" value="<?= old('temp'); ?>" placeholder="Masukkan TEMP">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('temp'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Time (Minutes)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control <?= (validation_show_error('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= old('time'); ?>" placeholder="Masukkan Time" min="0" max="99" maxlength="2">
                                            <span class="input-group-text">Minutes</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('time'); ?>
                                        </div>
                                    </div>

                                    <!-- keterangan system -->
                                    <div class="row mt-4">
                                        <div class="col">
                                            <h5>Keterangan System UPS</h5>
                                            <label class="mt-2">Kondisi System UPS</label>
                                            <select id="alert_systemups" class="form-control" name="alert_systemups" placeholder="Masukkan Kondisi System UPS">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="additional_info">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_systemups" name="message_systemups" placeholder="Masukkan Alarm Message">
                                                <label class="mt-2">Kerusakan</label>
                                                <select id="rusak_systemups" class="form-control" name="rusak_systemups" placeholder="Masukkan Kerusakan System UPS">
                                                    <option value="Tidak Rusak">Tidak Rusak</option>
                                                    <option value="Kipas">Kipas</option>
                                                    <option value="Kompresor">Kompresor</option>
                                                    <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                    <option value="Head Assanger">Head Assanger</option>
                                                </select>
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
    document.addEventListener("DOMContentLoaded", function() {
        const alertSelect = document.getElementById("alert_systemups");
        const additionalInfoDiv = document.getElementById("additional_info");

        alertSelect.addEventListener("change", function() {
            if (alertSelect.value === "Alarm ON") {
                $(additionalInfoDiv).collapse("show");
            } else {
                $(additionalInfoDiv).collapse("hide");
            }
        });
    });
</script>

<?= $this->endSection() ?>