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
                                <strong>Data Pemeriksa berhasil disimpan !</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                        <?php if (isset($validation)) { ?>
                        <?php } ?>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo base_url('utility/store') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <h5>UTILITY</h5>
                                        <div class="col">
                                            <label>MSB</label>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_U')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_U'); ?>" name="MSB_U" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_U'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_U2')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_U2'); ?>" name="MSB_U2" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kvar</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_U2'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_U3')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_U3'); ?>" name="MSB_U3" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kVA</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_U3'); ?>
                                            </div>
                                            <label class="mt-2">Kondisi MSB Utility</label>
                                            <select id="alert_MSBU" class="form-control" name="alert_MSBU" placeholder="Masukkan Kondisi Utility">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_utility1">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_MSBU" name="message_MSBU" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>UMSB</label>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('UMSB_U')) ? 'is-invalid' : ''; ?>" value="<?= old('UMSB_U'); ?>" name="UMSB_U" placeholder="Masukkan Data UMSB ">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('UMSB_U'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('UMSB_U2')) ? 'is-invalid' : ''; ?>" value="<?= old('UMSB_U2'); ?>" name="UMSB_U2" placeholder="Masukkan Data UMSB ">
                                                <span class="input-group-text">kvar</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('UMSB_U2'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('UMSB_U3')) ? 'is-invalid' : ''; ?>" value="<?= old('UMSB_U3'); ?>" name="UMSB_U3" placeholder="Masukkan Data UMSB ">
                                                <span class="input-group-text">kVA</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('UMSB_U3'); ?>
                                            </div>
                                            <label class="mt-2">Kondisi UMSB Utility</label>
                                            <select id="alert_UMSBU" class="form-control" name="alert_UMSBU" placeholder="Masukkan Kondisi Utility">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_utility2">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_UMSBU" name="message_UMSBU" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <h5>Staging</h5>
                                        <div class="col">
                                            <label>DB-UPS.A 20KVA</label>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_S')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_S'); ?>" name="MSB_S" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_S'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_S2')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_S2'); ?>" name="MSB_S2" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kvar</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_S2'); ?>
                                            </div>
                                            <div class="input-group mt-2">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('MSB_S3')) ? 'is-invalid' : ''; ?>" value="<?= old('MSB_S3'); ?>" name="MSB_S3" placeholder="Masukkan Data MSB">
                                                <span class="input-group-text">kVA</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('MSB_S3'); ?>
                                            </div>
                                            <label class="mt-2">Kondisi DB-UPS.A</label>
                                            <select id="alert_MSBS" class="form-control" name="alert_MSBS" placeholder="Masukkan Kondisi Utility">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_utility3">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_MSBS" name="message_MSBS" placeholder="Masukkan Alarm Message">
                                            </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertSelect = document.getElementById("alert_MSBU");
        const additionalInfoDiv = document.getElementById("add_utility1");

        alertSelect.addEventListener("change", function() {
            if (alertSelect.value === "Alarm ON") {
                $(additionalInfoDiv).collapse("show");
            } else {
                $(additionalInfoDiv).collapse("hide");
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertSelect = document.getElementById("alert_UMSBU");
        const additionalInfoDiv = document.getElementById("add_utility2");

        alertSelect.addEventListener("change", function() {
            if (alertSelect.value === "Alarm ON") {
                $(additionalInfoDiv).collapse("show");
            } else {
                $(additionalInfoDiv).collapse("hide");
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertSelect = document.getElementById("alert_MSBS");
        const additionalInfoDiv = document.getElementById("add_utility3");

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