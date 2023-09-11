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
                                    <strong>Data PAC berhasil disimpan !</strong> You should check in on some of those fields below.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                            <?php if(isset($validation)) { ?>
                                <?php } ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>INTEGRATED POWER DISTRIBUTION UNIT (IPDU)</h5><br>
                                        <h5>MAIN BREAKER 1</h5>
                                        <form action="<?php echo base_url('ipdu/store') ?>" method="POST">
                                        <div class="form-group mt-3">
                                            <label>P</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('p_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('p_mb1'); ?>" name="p_mb1" placeholder="Masukkan Nilai P">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('p_mb1'); ?>
                                            </div> 
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>S</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('s_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('s_mb1'); ?>" name="s_mb1" placeholder="Masukkan Nilai S">
                                                <span class="input-group-text">kVA</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('s_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Q</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('q_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('q_mb1'); ?>" name="q_mb1" placeholder="Masukkan Nilai Q">
                                                <span class="input-group-text">kvar</span>
                                            </div>   
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('q_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>PF</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pf_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('pf_mb1'); ?>" name="pf_mb1" placeholder="Masukkan Nilai PF">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('pf_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KWH</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kwh_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('kwh_mb1'); ?>" name="kwh_mb1" placeholder="Masukkan Nilai KWH">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kwh_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KVah</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kvah_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('kvah_mb1'); ?>" name="kvah_mb1" placeholder="Masukkan Nilai KVah">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kvah_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KVarh</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kvarh_mb1')) ? 'is-invalid' : ''; ?>" value="<?= old('kvarh_mb1'); ?>" name="kvarh_mb1" placeholder="Masukkan Nilai KVarh">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kvarh_mb1'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label class="mt-2">Kondisi Main Breaker 1</label>
                                            <select id="alert_ipdu1" class="form-control" name="alert_ipdu1" placeholder="Masukkan Kondisi Main Breaker">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_ipdu1">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_ipdu1" name="message_ipdu1" placeholder="Masukkan Alarm Message">
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <h5>MAIN BREAKER 2</h5>                                        
                                        <div class="form-group mt-3">
                                            <label>P</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('p_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('p_mb2'); ?>" name="p_mb2" placeholder="Masukkan Nilai P">
                                                <span class="input-group-text">kW</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('p_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>S</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('s_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('s_mb2'); ?>" name="s_mb2" placeholder="Masukkan Nilai S">
                                                <span class="input-group-text">kVA</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('s_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Q</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control <?= (validation_show_error('q_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('q_mb2'); ?>" name="q_mb2" placeholder="Masukkan Nilai Q">
                                                <span class="input-group-text">kvar</span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('q_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>PF</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pf_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('pf_mb2'); ?>" name="pf_mb2" placeholder="Masukkan Nilai PF">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('pf_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KWH</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kwh_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('kwh_mb2'); ?>" name="kwh_mb2" placeholder="Masukkan Nilai KWH">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kwh_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KVah</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kvah_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('kvah_mb2'); ?>" name="kvah_mb2" placeholder="Masukkan Nilai KVah">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kvah_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>KVarh</label>
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('kvarh_mb2')) ? 'is-invalid' : ''; ?>" value="<?= old('kvarh_mb2'); ?>" name="kvarh_mb2" placeholder="Masukkan Nilai KVarh">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('kvarh_mb2'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label class="mt-2">Kondisi Main Breaker 2</label>
                                            <select id="alert_ipdu2" class="form-control" name="alert_ipdu2" placeholder="Masukkan Kondisi Main Breaker">
                                                <option value="Normal">Normal</option>
                                                <option value="Alarm ON">Alarm ON</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Mati">Mati</option>
                                            </select>
                                            <div class="collapse mt-2" id="add_ipdu2">
                                                <label class="mt-2">Alarm Message</label>
                                                <input type="text" class="form-control" id="message_ipdu2" name="message_ipdu2" placeholder="Masukkan Alarm Message">
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
            const alertSelect = document.getElementById(`alert_ipdu${i}`);
            const additionalInfoDiv = document.getElementById(`add_ipdu${i}`);

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