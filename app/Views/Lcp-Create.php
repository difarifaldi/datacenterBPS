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
                                    <strong>Data Chiller berhasil disimpan !</strong> You should check in on some of those fields below.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                            <?php if(isset($validation)) { ?>
                            <?php } ?>
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo base_url('lcp/store') ?>" method="POST">
                                    <h5>LCP 1</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp1')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp1'); ?>" name="suhu_lcp1" placeholder="Masukkan Suhu LCP 1">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp1')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp1'); ?>" name="daya_lcp1" placeholder="Masukkan Daya LCP 1">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp1" class="form-control" name="alert_lcp1" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp1">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp1" name="message_lcp1" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 2</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp2')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp2'); ?>" name="suhu_lcp2" placeholder="Masukkan Suhu LCP 2">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp2')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp2'); ?>" name="daya_lcp2" placeholder="Masukkan Daya LCP 2">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp2" class="form-control" name="alert_lcp2" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp2">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp2" name="message_lcp2" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 3</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp3')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp3'); ?>" name="suhu_lcp3" placeholder="Masukkan Suhu LCP 3">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp3'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp3')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp3'); ?>" name="daya_lcp3" placeholder="Masukkan Daya LCP 3">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp3'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp3" class="form-control" name="alert_lcp3" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp3">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp3" name="message_lcp3" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 4</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp4')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp4'); ?>" name="suhu_lcp4" placeholder="Masukkan Suhu LCP 4">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp4'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp4')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp4'); ?>" name="daya_lcp4" placeholder="Masukkan Daya LCP 4">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp4'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp4" class="form-control" name="alert_lcp4" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp4">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp4" name="message_lcp4" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 5</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp5')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp5'); ?>" name="suhu_lcp5" placeholder="Masukkan Suhu LCP 5">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp5'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp5')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp5'); ?>" name="daya_lcp5" placeholder="Masukkan Daya LCP 5">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp5'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp5" class="form-control" name="alert_lcp5" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp5">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp5" name="message_lcp5" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 6</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp6')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp6'); ?>" name="suhu_lcp6" placeholder="Masukkan Suhu LCP 6">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp6'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp6')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp6'); ?>" name="daya_lcp6" placeholder="Masukkan Daya LCP 6">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp6'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp6" class="form-control" name="alert_lcp6" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp6">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp6" name="message_lcp6" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                    <h5>LCP 7</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp7')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp7'); ?>" name="suhu_lcp7" placeholder="Masukkan Suhu LCP 7">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp7'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp7')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp7'); ?>" name="daya_lcp7" placeholder="Masukkan Daya LCP 7">
                                                <span class="input-group-text">kW</span>
                                            </div><div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp7'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp7" class="form-control" name="alert_lcp7" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp7">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp7" name="message_lcp7" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-4"></div>
                                            <h5>LCP 8</h5>
                                        <div class="form-group">
                                            <label>Suhu</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_lcp8')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_lcp8'); ?>" name="suhu_lcp8" placeholder="Masukkan Suhu LCP 8">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('suhu_lcp8'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('daya_lcp8')) ? 'is-invalid' : ''; ?>" value="<?= old('daya_lcp8'); ?>" name="daya_lcp8" placeholder="Masukkan Daya LCP 8">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('daya_lcp8'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mt-2">Kondisi LCP</label>
                                            <select id="alert_lcp8" class="form-control" name="alert_lcp8" placeholder="Masukkan Kondisi LCP">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_lcp8">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_lcp8" name="message_lcp8" placeholder="Masukkan Alarm Message">
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
        for (let i = 1; i <= 6; i++) {
            const alertSelect = document.getElementById(`alert_lcp${i}`);
            const additionalInfoDiv = document.getElementById(`add_lcp${i}`);

            alertSelect.addEventListener("change", function() {
                if (alertSelect.value === "Alarm ON") {
                    $(additionalInfoDiv).collapse("show");
                } else {
                    $(additionalInfoDiv).collapse("hide");
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>