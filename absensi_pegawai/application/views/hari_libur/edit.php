<?php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'] ?>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Tambah Data Waktu Kerja</h3>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= date('l, d-F-Y', strtotime($hari_libur->tanggal)) ?>">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"><?= $hari_libur->keterangan ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('hari_libur') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>