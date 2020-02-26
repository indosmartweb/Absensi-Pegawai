<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Data Pangkat</h3>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="kode_pangkat">Pangkat</label>
                        <input type="text" class="form-control" name="kode_pangkat" id="kode_pangkat" placeholder="Masukan Kode Pangkat" value="<?= $pangkat->kode_pangkat ?>">
                        <?= form_error('kode_pangkat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="pangkat">Pangkat</label>
                        <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukan Pangkat" value="<?= $pangkat->pangkat ?>">
                        <?= form_error('pangkat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('pangkat') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>