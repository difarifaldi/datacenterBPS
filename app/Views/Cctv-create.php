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
                                    <form action="<?php echo base_url('cctv/store') ?>" method="POST">
                                        <div class="col">
                                            <h5>CCTV</h5>
                                            <label class="mt-2">Unit CCTV</label>
                                            <select id="unit_cctv" class="form-select" name="unit_cctv" placeholder="Masukkan Unit CCTV">   
                                                <option value="16" <?= old('unit_cctv') === '16' ? 'selected' : ''; ?>>16</option>
                                                <option value="15" <?= old('unit_cctv') === '15' ? 'selected' : ''; ?>>15</option>
                                                <option value="14" <?= old('unit_cctv') === '14' ? 'selected' : ''; ?>>14</option>
                                                <option value="13" <?= old('unit_cctv') === '13' ? 'selected' : ''; ?>>13</option>
                                                <option value="12" <?= old('unit_cctv') === '12' ? 'selected' : ''; ?>>12</option>
                                                <option value="11" <?= old('unit_cctv') === '11' ? 'selected' : ''; ?>>11</option>
                                                <option value="10" <?= old('unit_cctv') === '10' ? 'selected' : ''; ?>>10</option>
                                                <option value="9" <?= old('unit_cctv') === '9' ? 'selected' : ''; ?>>9</option>
                                                <option value="8" <?= old('unit_cctv') === '8' ? 'selected' : ''; ?>>8</option>
                                                <option value="7" <?= old('unit_cctv') === '7' ? 'selected' : ''; ?>>7</option>
                                                <option value="6" <?= old('unit_cctv') === '6' ? 'selected' : ''; ?>>6</option>
                                                <option value="5" <?= old('unit_cctv') === '5' ? 'selected' : ''; ?>>5</option>
                                                <option value="4" <?= old('unit_cctv') === '4' ? 'selected' : ''; ?>>4</option>
                                                <option value="3" <?= old('unit_cctv') === '3' ? 'selected' : ''; ?>>3</option>
                                                <option value="2" <?= old('unit_cctv') === '2' ? 'selected' : ''; ?>>2</option>
                                                <option value="1" <?= old('unit_cctv') === '1' ? 'selected' : ''; ?>>1</option>
                                                <option value="0" <?= old('unit_cctv') === '0' ? 'selected' : ''; ?>>0</option>
                                            </select>
                                            <label class="mt-2">Status CCTV</label>
                                            <input type="text" class="form-control " value="ON" name="status_cctv" style="" disabled>
                                            <input type="hidden" class="form-control " value="ON" name="status_cctv" style="" readonly>
                                            <label class="mt-2">Keterangan CCTV</label>
                                            <input type="text" class="form-control <?= (validation_show_error('keterangan_cctv')) ? 'is-invalid' : ''; ?>" value="<?= empty(old('keterangan_cctv')) ? 'Tidak ada kerusakan' : old('keterangan_cctv'); ?>"  name="keterangan_cctv" placeholder="Masukkan Keterangan CCTV"><span class="form-text">*Isi "Tidak ada kerusakan" jika semua unit cctv ON</span>
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('keterangan_cctv'); ?>
                                                </div>
                                            
                                        </div>
                                        <div class="col mt-3">
                                            <h5>Network Video Recorder (NVR)</h5>
                                            <label class="mt-2">Status Network Video Recorder</label>
                                            <select id="status_nvr" class="form-select" name="status_nvr" placeholder="Masukkan Status Network Video Recorder">
                                                <option value="ON" <?= old('status_nvr') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="OFF" <?= old('status_nvr') === 'OFF' ? 'selected' : ''; ?>>OFF</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <h5></h5>
                                            <label class="mt-2">Status Record</label>
                                            <select id="record" class="form-select" name="record" placeholder="Masukkan Status Record">
                                                <option value="ON" <?= old('record') === 'ON' ? 'selected' : ''; ?>>ON</option>
                                                <option value="OFF" <?= old('record') === 'OFF' ? 'selected' : ''; ?>>OFF</option>
                                            </select>
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