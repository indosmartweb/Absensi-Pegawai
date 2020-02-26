<?php $user  = $this->m_pegawai->detail($this->session->userdata('id')) ?>
<?php $hari  = hari() ?>
<?php $bulan = bulan() ?>
<?php $h  = $hari[date('N', time() + 60 * 60 * 6)] ?>
<?php $t  = date('d', time() + 60 * 60 * 6) ?>
<?php $b  = $bulan[date('n', time() + 60 * 60 * 6)] ?>
<?php $th = date('Y', time() + 60 * 60 * 6 ) ?>
<?php $sekarang = date('H:i:s', time() + 60 * 60 * 6) ?>
<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <?php if( !empty($masuk) ) : ?>
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-12">
                        
                        <table class="table">
                            <tr>
                                <th width="10%">Tanggal</th>
                                <th>: <?= $h.', '.$t.'-'.$b.'-'.$th ?></th>
                            </tr>
                            <tr>
                                <th>Masuk</th>
                                <th>: <?= $masuk->masuk_kerja ?></th>
                            </tr>
                            <tr>
                                <th>Pulang</th>
                                <th>: <?= $masuk->pulang_kerja ?></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>: <?= $user->nama_pekerja ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <div class="col-12 text-center" id="in-location">
                        <?php if( empty($cek_hari_libur) ) : ?>
                            <?php $masuk_kerja = date('H:i:s', strtotime('12:00:00')) ?>
                            <?php if( $sekarang < $masuk_kerja ) : ?>
                                <?= form_open() ?>
                                    <input type="hidden" name="pegawai_id" value="<?= $this->session->userdata('id') ?>">
                                    <input type="hidden" name="masuk" value="masuk">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt fa-fw"></i> masuk</button>
                                <?= form_close() ?>
                            <?php else : ?>
                                <?= form_open() ?>
                                    <input type="hidden" name="pegawai_id" value="<?= $this->session->userdata('id') ?>">
                                    <input type="hidden" name="pulang" value="pulang">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-sign-out-alt     fa-fw"></i> pulang</button>
                                <?= form_close() ?>
                            <?php endif ?>
                        <?php else : ?>
                            <p>Sekarang Hari Libur Anda Tidak Di Ijinkan Absen</p>
                        <?php endif ?>
                    </div>
                    <div class="col-12 text-center" id="non-location"></div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="card">
            <div class="card-body text-center">
                <h2>Sekarang Hari Libur</h2>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>