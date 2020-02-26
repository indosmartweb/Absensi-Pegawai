<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Data Unit Kerja</h3>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="kode_unit_kerja">Kode Unit Kerja</label>
                        <input type="text" class="form-control" name="kode_unit_kerja" id="kode_unit_kerja" placeholder="Masukan Kode Unit Kerja" value="<?= $unit_kerja->kode_unit_kerja ?>">
                        <?= form_error('kode_unit_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja</label>
                        <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Masukan Unit Kerja" value="<?= $unit_kerja->unit_kerja ?>">
                        <?= form_error('unit_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nip_atasan">NIP Atasan</label>
                        <input type="text" class="form-control" name="nip_atasan" id="nip_atasan" placeholder="Masukan NIP Atasan" value="<?= $unit_kerja->nip_atasan ?>">
                        <?= form_error('nip_atasan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_atasan">Nama Atasan</label>
                        <input type="text" class="form-control" name="nama_atasan" id="nama_atasan" placeholder="Masukan Nama Atasan" value="<?= $unit_kerja->nama_atasan ?>">
                        <?= form_error('nama_atasan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" cols="30" rows="3"><?= $unit_kerja->keterangan ?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('unit_kerja') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>