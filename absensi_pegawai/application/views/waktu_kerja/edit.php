<?php $hari = hari() ?>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Tambah Data Waktu Kerja</h3>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select id="hari" class="form-control" name="hari">
                            <?php $i = 0; ?>
                            <?php foreach( $hari as $h ) : ?>
                                <option value="<?php echo $i ?>" <?php if( $i == $waktu_kerja->hari ) { echo 'selected'; } ?>><?php echo $h ?></option>
                            <?php $i++ ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="masuk_kerja">Jam Masuk Kerja</label>
                        <input type="text" class="form-control" name="masuk_kerja" id="masuk_kerja" placeholder="Masukan Jam Masuk Kerja" value="<?= $waktu_kerja->masuk_kerja ?>">
                        <?= form_error('masuk_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="pulang_kerja">Jam Pulang Kerja</label>
                        <input type="text" class="form-control" name="pulang_kerja" id="pulang_kerja" placeholder="Masukan Jam Pulang Kerja" value="<?= $waktu_kerja->pulang_kerja ?>">
                        <?= form_error('pulang_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('waktu_kerja') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>