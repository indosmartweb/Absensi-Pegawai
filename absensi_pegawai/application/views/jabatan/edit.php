<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Data Jabatan</h3>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="kode_jabatan">Kode Jabatan</label>
                        <input type="text" class="form-control" name="kode_jabatan" id="kode_jabatan" placeholder="Masukan Kode Jabatan" value="<?= $jabatan->kode_jabatan ?>">
                        <?= form_error('kode_jabatan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" id="jabatan" placeholder="Masukan Jabatan" value="<?= $jabatan->nama_jabatan ?>">
                        <?= form_error('jabatan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" cols="30" rows="3"><?= $jabatan->keterangan ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('jabatan') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>