<?= $this->extend('main') ?>
<?= $this->extend('navbar') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <?php validation_list_errors() ?>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo base_url('pac/store') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <!-- PAC 1 -->
                                        <div class="col">
                                            <h5>PAC 1</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac1" class="form-select" name="status_pac1" placeholder="Masukkan Status PAC 1">
                                                <option value="ON" <?= old('status_pac1') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac1') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac1_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac1')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac1'); ?>" name="suhu_pac1" placeholder="Masukkan Suhu PAC 1">
                                                    <span class="input-group-text">°C</span>
                                                    <div class="invalid-feedback">
                                                        <?= validation_show_error('suhu_pac1'); ?>
                                                    </div>
                                                </div>

                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac1')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac1'); ?>" name="temp_pac1" placeholder="Masukkan Temperature PAC 1">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac1'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac1" class="form-control" name="alert_pac1" placeholder="Masukkan Kondisi PAC 1">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac1">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac1" name="message_pac1" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac1" class="form-control" name="rusak_pac1" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <!-- PAC 2 -->
                                        <div class="col">
                                            <h5>PAC 2</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac2" class="form-select" name="status_pac2" placeholder="Masukkan Status PAC 2">
                                                <option value="ON" <?= old('status_pac2') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac2') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac2_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac2')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac2'); ?>" name="suhu_pac2" placeholder="Masukkan Suhu PAC 2">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('suhu_pac2'); ?>
                                                </div>
                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac2')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac2'); ?>" name="temp_pac2" placeholder="Masukkan Temperature PAC 2">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac2'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac2" class="form-control" name="alert_pac2" placeholder="Masukkan Kondisi PAC 2">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac2">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac2" name="message_pac2" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac2" class="form-control" name="rusak_pac2" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mt-3">
                                        <!-- PAC 3 -->
                                        <div class="col">
                                            <h5>PAC 3</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac3" class="form-select" name="status_pac3" placeholder="Masukkan Status PAC 3">
                                                <option value="ON" <?= old('status_pac3') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac3') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac3_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac3')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac3'); ?>" name="suhu_pac3" placeholder="Masukkan Suhu PAC 3">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('suhu_pac3'); ?>
                                                </div>
                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac3')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac3'); ?>" name="temp_pac3" placeholder="Masukkan Temperature PAC 3">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac3'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac3" class="form-control" name="alert_pac3" placeholder="Masukkan Kondisi PAC 3">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac3">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac3" name="message_pac3" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac3" class="form-control" name="rusak_pac3" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Pac 4 -->
                                        <div class="col">
                                            <h5>PAC 4</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac4" class="form-select" name="status_pac4" placeholder="Masukkan Status PAC 4">
                                                <option value="ON" <?= old('status_pac4') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac4') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac4_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac4')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac4'); ?>" name="suhu_pac4" placeholder="Masukkan Suhu PAC 4">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('suhu_pac4'); ?>
                                                </div>
                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac4')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac4'); ?>" name="temp_pac4" placeholder="Masukkan Temperature PAC 4">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac4'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac4" class="form-control" name="alert_pac4" placeholder="Masukkan Kondisi PAC 4">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac4">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac4" name="message_pac4" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac4" class="form-control" name="rusak_pac4" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mt-3">
                                        <!-- PAC 5 -->
                                        <div class="col">
                                            <h5>PAC 5</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac5" class="form-select" name="status_pac5" placeholder="Masukkan Status PAC 5">
                                                <option value="ON" <?= old('status_pac5') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac5') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac5_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac5')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac5'); ?>" name="suhu_pac5" placeholder="Masukkan Suhu PAC 5">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('suhu_pac5'); ?>
                                                </div>
                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac5')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac5'); ?>" name="temp_pac5" placeholder="Masukkan Temperature PAC 5">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac5'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac5" class="form-control" name="alert_pac5" placeholder="Masukkan Kondisi PAC 5">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac5">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac5" name="message_pac5" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac5" class="form-control" name="rusak_pac5" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- PAC 6 -->
                                        <div class="col">
                                            <h5>PAC 6</h5>
                                            <label class="mt-2">Status</label>
                                            <select id="status_pac6" class="form-select" name="status_pac6" placeholder="Masukkan Status PAC 6">
                                                <option value="ON" <?= old('status_pac6') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="Stand By" <?= old('status_pac6') === 'Stand By' ? 'selected' : ''; ?>>Stand By</option>
                                            </select>
                                            <div class="collapse show mt-2" id="pac6_add">
                                                <label class="mt-2">Suhu</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('suhu_pac6')) ? 'is-invalid' : ''; ?>" value="<?= old('suhu_pac6'); ?>" name="suhu_pac6" placeholder="Masukkan Suhu PAC 6">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('suhu_pac6'); ?>
                                                </div>
                                                <label class="mt-2">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control <?= (validation_show_error('temp_pac6')) ? 'is-invalid' : ''; ?>" value="<?= old('temp_pac6'); ?>" name="temp_pac6" placeholder="Masukkan Temperature PAC 6">
                                                    <span class="input-group-text">RH</span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('temp_pac6'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="mt-2">Kondisi PAC</label>
                                                <select id="alert_pac6" class="form-control" name="alert_pac6" placeholder="Masukkan Kondisi PAC 6">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Alarm ON">Alarm ON</option>
                                                    <option value="Perbaikan">Perbaikan</option>
                                                    <option value="Mati">Mati</option>
                                                </select>
                                                <div class="collapse mt-2" id="add_pac6">
                                                    <label class="mt-2">Alarm Message</label>
                                                    <input type="text" class="form-control" id="message_pac6" name="message_pac6" placeholder="Masukkan Alarm Message">
                                                    <label class="mt-2">Kerusakan</label>
                                                    <select id="rusak_pac6" class="form-control" name="rusak_pac6" placeholder="Masukkan Kerusakan PAC">
                                                        <option value="Tidak Rusak">Tidak Rusak</option>
                                                        <option value="Kipas">Kipas</option>
                                                        <option value="Kompresor">Kompresor</option>
                                                        <option value="Instalasi Pipa">Instalasi Pipa</option>
                                                        <option value="Head Assanger">Head Assanger</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
            const pac = document.getElementById(`status_pac${i}`);
            const pac_add = document.getElementById(`pac${i}_add`);

            pac.addEventListener("change", function() {
                if (pac.value === "ON") {
                    $(pac_add).collapse("show");
                    const suhu_pac = document.getElementsByName(`suhu_pac${i}`)[0];
                    const temp_pac = document.getElementsByName(`temp_pac${i}`)[0];

                    suhu_pac.value = "";
                    temp_pac.value = "";
                } else {
                    $(pac_add).collapse("hide");
                    const suhu_pac = document.getElementsByName(`suhu_pac${i}`)[0];
                    const temp_pac = document.getElementsByName(`temp_pac${i}`)[0];

                    suhu_pac.value = 0;
                    temp_pac.value = 0;
                }
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        for (let i = 1; i <= 6; i++) {
            const alertSelect = document.getElementById(`alert_pac${i}`);
            const additionalInfoDiv = document.getElementById(`add_pac${i}`);

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