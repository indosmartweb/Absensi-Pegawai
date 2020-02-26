<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-block">
                <h2 class="text-center">Ganti Password</h2>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input id="old_password" class="form-control" type="password" name="old_password">
                        <?php if( isset($error) ) : ?>
                            <small class="text-danger"><?= $error ?></small>
                        <?php endif  ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input id="new_password" class="form-control" type="password" name="new_password">
                        <?= form_error('new_password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kon_pass">Konfirmasi Password</label>
                        <input id="kon_pass" class="form-control" type="password" name="kon_pass">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i> Simpan</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>