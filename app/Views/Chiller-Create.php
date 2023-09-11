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
                                <strong>Data IPDU berhasil disimpan !</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                        <?php if (isset($validation)) { ?>
                        <?php } ?>
                        <div class="card">
                            <div class="card-body">
                                <h5>CHILLER 1</h5>
                                <form action="<?php echo base_url('chiller/store') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Status Chiller</label>
                                        <select id="status_chiller1" class="form-select" name="status_chiller1" placeholder="Masukkan Status Chiller">
                                            <option value="COOLING">COOLING</option>
                                            <option value="STANDBY">STANDBY</option>
                                            <option value="OFF">OFF</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>OUT Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('out_temp_chiller1')) ? 'is-invalid' : ''; ?>" name="out_temp_chiller1" value="<?= old('out_temp_chiller1'); ?>" placeholder="Masukkan Nilai OUT Temperature">
                                            <span class="input-group-text">°C</span>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('out_temp_chiller1'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-2">
                                        <label>IN Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('in_temp_chiller1')) ? 'is-invalid' : ''; ?>" name="in_temp_chiller1" value="<?= old('in_temp_chiller1'); ?>" placeholder="Masukkan Nilai IN Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('in_temp_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Ambient Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('amb_temp_chiller1')) ? 'is-invalid' : ''; ?>" name="amb_temp_chiller1" value="<?= old('amb_temp_chiller1'); ?>" placeholder="Masukkan Nilai Ambient Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('amb_temp_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>FreeCooling Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('free_temp_chiller1')) ? 'is-invalid' : ''; ?>" name="free_temp_chiller1" value="<?= old('free_temp_chiller1'); ?>" placeholder="Masukkan Nilai FreeCooling Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('free_temp_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Setpoint Medium</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('setpoint_chiller1')) ? 'is-invalid' : ''; ?>" name="setpoint_chiller1" value="<?= old('setpoint_chiller1'); ?>" placeholder="Masukkan Nilai Setpoint Medium">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('setpoint_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 1 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump1_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('pump1_chiller1'); ?>" name="pump1_chiller1" placeholder="Masukkan Nilai Hydraulic Pump 1 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump1_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 2 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump2_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('pump2_chiller1'); ?>" name="pump2_chiller1" placeholder="Masukkan Nilai Hydraulic Pump 2 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump2_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 1</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden1_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('conden1_chiller1'); ?>" name="conden1_chiller1" placeholder="Masukkan Nilai Condensation Pressure 1">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden1_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 2</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden2_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('conden2_chiller1'); ?>" name="conden2_chiller1" placeholder="Masukkan Nilai Condensation Pressure 2">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden2_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Cooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('cooling_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('cooling_chiller1'); ?>" name="cooling_chiller1" placeholder="Masukkan Nilai Cooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('cooling_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Freecooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('freecooling_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('freecooling_chiller1'); ?>" name="freecooling_chiller1" placeholder="Masukkan Nilai Freecooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('freecooling_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Suction)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('suction_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('suction_chiller1'); ?>" name="suction_chiller1" placeholder="Masukkan Nilai Hydr. Pressure (Suction)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('suction_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Discharge)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('discharge_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('discharge_chiller1'); ?>" name="discharge_chiller1" placeholder="Masukkan Nilai Hydr. Pressure (Discharge)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('discharge_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Flow Rate</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('flowrate_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('flowrate_chiller1'); ?>" name="flowrate_chiller1" placeholder="Masukkan Nilai Flow Rate">
                                            <span class="input-group-text">l/min</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('flowrate_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Current Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('current_con_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('current_con_chiller1'); ?>" name="current_con_chiller1" placeholder="Masukkan Nilai Current Consumption">
                                            <span class="input-group-text">Amp</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('current_con_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Voltage</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('voltage_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('voltage_chiller1'); ?>" name="voltage_chiller1" placeholder="Masukkan Nilai Voltage">
                                            <span class="input-group-text">Volt</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('voltage_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('power_con_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('power_con_chiller1'); ?>" name="power_con_chiller1" placeholder="Masukkan Nilai Power Consumption">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_con_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>EER</label>
                                        <input type="number" step="0.01" class="form-control <?= (validation_show_error('eer_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('eer_chiller1'); ?>" name="eer_chiller1" placeholder="Masukkan Nilai EER">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('eer_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Supply</label>
                                        <input type="text" class="form-control <?= (validation_show_error('power_sup_chiller1')) ? 'is-invalid' : ''; ?>" value="<?= old('power_sup_chiller1'); ?>" name="power_sup_chiller1" placeholder="Masukkan Sumber Power Supply">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_sup_chiller1'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Alarm</label>
                                        <select id="alarm_chiller1" class="form-control" name="alarm_chiller1" placeholder="Masukkan Status Alarm">
                                            <option value="NO ALARM">NO ALARM</option>
                                            <option value="ACTIVE ALARM">ACTIVE ALARM</option>
                                        </select>
                                    </div>
                                    <div class="collapse mt-2" id="add_alarm1">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_chiller1" name="message_chiller1" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_chiller1" class="form-control" name="rusak_chiller1" placeholder="Masukkan Kerusakan Chiller">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Kondisi Chiller</label>
                                        <select id="alert_chiller1" class="form-control" name="alert_chiller1" placeholder="Masukkan Kondisi Chiller">
                                            <option value="Normal">Normal</option>
                                            <option value="Perbaikan">Perbaikan</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                    <div class="mt-4"></div>
                                    <h5>CHILLER 2</h5>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Status Chiller</label>
                                        <select id="status_chiller2" class="form-control" name="status_chiller2" placeholder="Masukkan Status Chiller">
                                            <option value="COOLING">COOLING</option>
                                            <option value="STANDBY">STANDBY</option>
                                            <option value="OFF">OFF</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>OUT Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('out_temp_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('out_temp_chiller2'); ?>" name="out_temp_chiller2" placeholder="Masukkan Nilai OUT Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('out_temp_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>IN Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('in_temp_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('in_temp_chiller2'); ?>" name="in_temp_chiller2" placeholder="Masukkan Nilai IN Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('in_temp_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Ambient Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('amb_temp_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('amb_temp_chiller2'); ?>" name="amb_temp_chiller2" placeholder="Masukkan Nilai Ambient Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('amb_temp_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>FreeCooling Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('free_temp_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('free_temp_chiller2'); ?>" name="free_temp_chiller2" placeholder="Masukkan Nilai FreeCooling Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('free_temp_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Setpoint Medium</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('setpoint_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('setpoint_chiller2'); ?>" name="setpoint_chiller2" placeholder="Masukkan Nilai Setpoint Medium">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('setpoint_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 1 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump1_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('pump1_chiller2'); ?>" name="pump1_chiller2" placeholder="Masukkan Nilai Hydraulic Pump 1 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump1_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 2 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump2_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('pump2_chiller2'); ?>" name="pump2_chiller2" placeholder="Masukkan Nilai Hydraulic Pump 2 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump2_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 1</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden1_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('conden1_chiller2'); ?>" name="conden1_chiller2" placeholder="Masukkan Nilai Condensation Pressure 1">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden1_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 2</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden2_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('conden2_chiller2'); ?>" name="conden2_chiller2" placeholder="Masukkan Nilai Condensation Pressure 2">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden2_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Cooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('cooling_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('cooling_chiller2'); ?>" name="cooling_chiller2" placeholder="Masukkan Nilai Cooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('cooling_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Freecooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('freecooling_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('freecooling_chiller2'); ?>" name="freecooling_chiller2" placeholder="Masukkan Nilai Freecooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('freecooling_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Suction)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('suction_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('suction_chiller2'); ?>" name="suction_chiller2" placeholder="Masukkan Nilai Hydr. Pressure (Suction)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('suction_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Discharge)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('discharge_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('discharge_chiller2'); ?>" name="discharge_chiller2" placeholder="Masukkan Nilai Hydr. Pressure (Discharge)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('discharge_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Flow Rate</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('flowrate_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('flowrate_chiller2'); ?>" name="flowrate_chiller2" placeholder="Masukkan Nilai Flow Rate">
                                            <span class="input-group-text">l/min</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('flowrate_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Current Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('current_con_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('current_con_chiller2'); ?>" name="current_con_chiller2" placeholder="Masukkan Nilai Current Consumption">
                                            <span class="input-group-text">Amp</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('current_con_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Voltage</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('voltage_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('voltage_chiller2'); ?>" name="voltage_chiller2" placeholder="Masukkan Nilai Voltage">
                                            <span class="input-group-text">Volt</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('voltage_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('power_con_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('power_con_chiller2'); ?>" name="power_con_chiller2" placeholder="Masukkan Nilai Power Consumption">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_con_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>EER</label>
                                        <input type="number" step="0.01" class="form-control <?= (validation_show_error('eer_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('eer_chiller2'); ?>" name="eer_chiller2" placeholder="Masukkan Nilai EER">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('eer_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Supply</label>
                                        <input type="text" class="form-control <?= (validation_show_error('power_sup_chiller2')) ? 'is-invalid' : ''; ?>" value="<?= old('power_sup_chiller2'); ?>" name="power_sup_chiller2" placeholder="Masukkan Sumber Power Supply">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_sup_chiller2'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Alarm</label>
                                        <select id="alarm_chiller2" class="form-control" name="alarm_chiller2" placeholder="Masukkan Status Alarm">
                                            <option value="NO ALARM">NO ALARM</option>
                                            <option value="ACTIVE ALARM">ACTIVE ALARM</option>
                                        </select>
                                    </div>
                                    <div class="collapse mt-2" id="add_alarm2">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_chiller2" name="message_chiller2" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_chiller2" class="form-control" name="rusak_chiller2" placeholder="Masukkan Kerusakan Chiller">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Kondisi Chiller</label>
                                        <select id="alert_chiller2" class="form-control" name="alert_chiller2" placeholder="Masukkan Kondisi Chiller">
                                            <option value="Normal">Normal</option>
                                            <option value="Perbaikan">Perbaikan</option>
                                            <option value="Mati">Mati</option>
                                        </select>
                                    </div>
                                    <div class="mt-4"></div>
                                    <h5>CHILLER 3</h5>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Status Chiller</label>
                                        <select id="status_chiller3" class="form-control" name="status_chiller3" placeholder="Masukkan Status Chiller">
                                            <option value="COOLING">COOLING</option>
                                            <option value="STANDBY">STANDBY</option>
                                            <option value="OFF">OFF</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>OUT Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('out_temp_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('out_temp_chiller3'); ?>" name="out_temp_chiller3" placeholder="Masukkan Nilai OUT Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('out_temp_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>IN Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('in_temp_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('in_temp_chiller3'); ?>" name="in_temp_chiller3" placeholder="Masukkan Nilai IN Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('in_temp_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Ambient Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('amb_temp_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('amb_temp_chiller3'); ?>" name="amb_temp_chiller3" placeholder="Masukkan Nilai Ambient Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('amb_temp_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>FreeCooling Temperature</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('free_temp_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('free_temp_chiller3'); ?>" name="free_temp_chiller3" placeholder="Masukkan Nilai FreeCooling Temperature">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('free_temp_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Setpoint Medium</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('setpoint_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('setpoint_chiller3'); ?>" name="setpoint_chiller3" placeholder="Masukkan Nilai Setpoint Medium">
                                            <span class="input-group-text">°C</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('setpoint_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 1 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump1_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('pump1_chiller3'); ?>" name="pump1_chiller3" placeholder="Masukkan Nilai Hydraulic Pump 1 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump1_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydraulic Pump 2 speed</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('pump2_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('pump2_chiller3'); ?>" name="pump2_chiller3" placeholder="Masukkan Nilai Hydraulic Pump 2 speed">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('pump2_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 1</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden1_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('conden1_chiller3'); ?>" name="conden1_chiller3" placeholder="Masukkan Nilai Condensation Pressure 1">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden1_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Condensation Pressure 2</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('conden2_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('conden2_chiller3'); ?>" name="conden2_chiller3" placeholder="Masukkan Nilai Condensation Pressure 2">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('conden2_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Cooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('cooling_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('cooling_chiller3'); ?>" name="cooling_chiller3" placeholder="Masukkan Nilai Cooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('cooling_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Freecooling Capacity</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('freecooling_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('freecooling_chiller3'); ?>" name="freecooling_chiller3" placeholder="Masukkan Nilai Freecooling Capacity">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('freecooling_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Suction)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('suction_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('suction_chiller3'); ?>" name="suction_chiller3" placeholder="Masukkan Nilai Hydr. Pressure (Suction)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('suction_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Hydr. Pressure (Discharge)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('discharge_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('discharge_chiller3'); ?>" name="discharge_chiller3" placeholder="Masukkan Nilai Hydr. Pressure (Discharge)">
                                            <span class="input-group-text">bar</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('discharge_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Flow Rate</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('flowrate_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('flowrate_chiller3'); ?>" name="flowrate_chiller3" placeholder="Masukkan Nilai Flow Rate">
                                            <span class="input-group-text">l/min</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('flowrate_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Current Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('current_con_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('current_con_chiller3'); ?>" name="current_con_chiller3" placeholder="Masukkan Nilai Current Consumption">
                                            <span class="input-group-text">Amp</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('current_con_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Voltage</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('voltage_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('voltage_chiller3'); ?>" name="voltage_chiller3" placeholder="Masukkan Nilai Voltage">
                                            <span class="input-group-text">Volt</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('voltage_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Consumption</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" class="form-control <?= (validation_show_error('power_con_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('power_con_chiller3'); ?>" name="power_con_chiller3" placeholder="Masukkan Nilai Power Consumption">
                                            <span class="input-group-text">KW</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_con_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>EER</label>
                                        <input type="number" step="0.01" class="form-control <?= (validation_show_error('eer_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('eer_chiller3'); ?>" name="eer_chiller3" placeholder="Masukkan Nilai EER">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('eer_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Power Supply</label>
                                        <input type="text" class="form-control <?= (validation_show_error('power_sup_chiller3')) ? 'is-invalid' : ''; ?>" value="<?= old('power_sup_chiller3'); ?>" name="power_sup_chiller3" placeholder="Masukkan Sumber Power Supply">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('power_sup_chiller3'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Alarm</label>
                                        <select id="alarm_chiller3" class="form-control" name="alarm_chiller3" placeholder="Masukkan Status Alarm">
                                            <option value="NO ALARM">NO ALARM</option>
                                            <option value="ACTIVE ALARM">ACTIVE ALARM</option>
                                        </select>
                                    </div>
                                    <div class="collapse mt-2" id="add_alarm3">
                                        <label class="mt-2">Alarm Message</label>
                                        <input type="text" class="form-control" id="message_chiller3" name="message_chiller3" placeholder="Masukkan Alarm Message">
                                        <label class="mt-2">Kerusakan</label>
                                        <select id="rusak_chiller3" class="form-control" name="rusak_chiller3" placeholder="Masukkan Kerusakan Chiller">
                                            <option value="Tidak Rusak">Tidak Rusak</option>
                                            <option value="Kipas">Kipas</option>
                                            <option value="Kompresor">Kompresor</option>
                                            <option value="Instalasi Pipa">Instalasi Pipa</option>
                                            <option value="Head Assanger">Head Assanger</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="mt-2">Kondisi Chiller</label>
                                        <select id="alert_chiller3" class="form-control" name="alert_chiller3" placeholder="Masukkan Kondisi Chiller">
                                            <option value="Normal">Normal</option>
                                            <option value="Perbaikan">Perbaikan</option>
                                            <option value="Mati">Mati</option>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        for (let i = 1; i <= 6; i++) {
            const alertSelect = document.getElementById(`alarm_chiller${i}`);
            const additionalInfoDiv = document.getElementById(`add_alarm${i}`);

            alertSelect.addEventListener("change", function() {
                if (alertSelect.value === "ACTIVE ALARM") {
                    $(additionalInfoDiv).collapse("show");
                } else {
                    $(additionalInfoDiv).collapse("hide");
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>