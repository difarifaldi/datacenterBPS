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
                                    <strong>Data System UPS berhasil disimpan !</strong> You should check in on some of those fields below.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>
                <?php if(isset($validation)) { ?>
                    <?php } ?>
                <div class="card">
                    <div class="card-body">
                    <h5>MODUL UPS</h5>
                        <form action="<?php echo base_url('modulups/store') ?>" method="POST">
                            <div class="row mt-4">
                                <h5>UPS 1</h5>
                                <div class="col">
                                    <label class="">Status</label>
                                        <select id="statusups1" class="form-control form-select form-select-md " name="statusups1" placeholder="Masukkan Status Modul UPS">
                                            <option value="On Battery">On Battery</option>
                                            <option value="Bypass">Bypass</option>
                                        </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups1" class="form-control" name="alert_modulups1" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul1">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups1" name="message_modulups1" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups1" class="form-control" name="rusak_modulups1" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 2</h5>
                                <div class="col">
                                    <label class="">Status</label>
                                    <select id="statusups2" class="form-control form-select form-select-md " name="statusups2" placeholder="Masukkan Status Modul UPS">
                                        <option value="On Battery">On Battery</option>
                                        <option value="Bypass">Bypass</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups2" class="form-control" name="alert_modulups2" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul2">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups2" name="message_modulups2" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups2" class="form-control" name="rusak_modulups2" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 3</h5>
                                <div class="col">
                                    <label class="">Status</label>
                                    <select id="statusups3" class="form-control form-select form-select-md " name="statusups3" placeholder="Masukkan Status Modul UPS">
                                        <option value="On Battery">On Battery</option>
                                        <option value="Bypass">Bypass</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups3" class="form-control" name="alert_modulups3" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul3">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups3" name="message_modulups3" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups3" class="form-control" name="rusak_modulups3" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 4</h5>
                                <div class="col">
                                    <label class="">Status</label>
                                        <select id="statusups4" class="form-control form-select form-select-md " name="statusups4" placeholder="Masukkan Status Modul UPS">
                                            <option value="On Battery">On Battery</option>
                                            <option value="Bypass">Bypass</option>
                                        </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups4" class="form-control" name="alert_modulups4" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul4">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups4" name="message_modulups4" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups4" class="form-control" name="rusak_modulups4" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 5</h5>
                                <div class="col">
                                <label class="">Status</label>
                                    <select id="statusups5" class="form-control form-select form-select-md " name="statusups5" placeholder="Masukkan Status Modul UPS">
                                        <option value="On Battery">On Battery</option>
                                        <option value="Bypass">Bypass</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups5" class="form-control" name="alert_modulups5" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul5">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups5" name="message_modulups5" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups5" class="form-control" name="rusak_modulups5" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 6</h5>
                                <div class="col">
                                <label class="">Status</label>
                                    <select id="statusups6" class="form-control form-select form-select-md " name="statusups6" placeholder="Masukkan Status Modul UPS">
                                        <option value="On Battery">On Battery</option>
                                        <option value="Bypass">Bypass</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups6" class="form-control" name="alert_modulups6" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul6">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups6" name="message_modulups6" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups6" class="form-control" name="rusak_modulups6" placeholder="Masukkan Kerusakan Modul UPS">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h5>UPS 7</h5>
                                <div class="col">
                                <label class="">Status</label>
                                    <select id="statusups7" class="form-control form-select form-select-md " name="statusups7" placeholder="Masukkan Status Modul UPS">
                                        <option value="On Battery">On Battery</option>
                                        <option value="Bypass">Bypass</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Kondisi Modul UPS</label> 
                                    <select id="alert_modulups7" class="form-control" name="alert_modulups7" placeholder="Masukkan Kondisi Modul UPS">
                                        <option value="Normal">Normal</option>
                                        <option value="Alarm ON">Alarm ON</option>
                                        <option value="Perbaikan">Perbaikan</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                    <div class="collapse mt-2" id="add_modul7">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_modulups7" name="message_modulups7" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_modulups7" class="form-control" name="rusak_modulups7" placeholder="Masukkan Kerusakan Modul UPS">
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
        for (let i = 1; i <= 6; i++) {
            const alertSelect = document.getElementById(`alert_modulups${i}`);
            const additionalInfoDiv = document.getElementById(`add_modul${i}`);

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