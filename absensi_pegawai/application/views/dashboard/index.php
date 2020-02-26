<style>
    .amcharts-chart-div a {
        display: none !important;
    }
</style>
<?php $bulan = bulan() ?>
<div class="row clearfix">
    <?php if( $user->user_id == 0 ) : ?>
        <div class="col-12 text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang <?= $user->nama_pekerja ?></h5>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <?= form_open() ?>
                    <div class="row">
                        <div class="col-3">
                            <h3>Statistik Kehadiran Pegawai</h3>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select id="tahun" class="form-control" name="tahun">
                                    <option value="">Tahun</option>
                                    <?php for( $i = 2020; $i < 2030; $i++ ) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select id="bulan" class="form-control" name="bulan">
                                    <?php $i = 0 ?>
                                    <?php foreach( $bulan as $b ) : ?>
                                        <option value="0<?= $i ?>"><?= $b ?></option>
                                    <?php $i++ ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-block btn-info"><i class="ik ik-eye"></i> Lihat</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="card-block text-center">
                    <div id="bar_chart" class="chart-shadow" <?php if( isset($pegawai_dash) ) { echo 'style="height:400px"'; } ?>></div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>