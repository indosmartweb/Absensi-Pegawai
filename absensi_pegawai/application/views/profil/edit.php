<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dt-responsive">
                    <div class="text-center">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="img img-thumbnail rounded-circle" src="<?php echo base_url('assets/uploads/'.$user->foto); ?>" alt="User profile picture" width="150px">
                                <h3 class="profile-username text-center"><?php echo $user->nama_pekerja ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open_multipart() ?>
                        <div class="row">
                            <div class="col-5"></div>
                                <div class="col-2">
                                    <input id="foto" class="form-control-file" type="file" name="foto">
                                    <?php if( isset($error) ) : ?>
                                            <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>
                            <div class="col-5"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">NIP</label>
                            <div class="col-sm-12">
                                <td><h3><?php echo $user->nip ?></h3></td>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="nama_pekerja" placeholder="Nama" value="<?php echo $user->nama_pekerja ?>"></td>
                                <?= form_error('nama_pekerja', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="username" placeholder="Username" value="<?php echo $user->username ?>"></td>
                                 <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No KTP</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="no_ktp" placeholder="no KTP" value="<?php echo $user->no_ktp ?>"></td>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="jenis_kelamin"> Jenis Kelamin</label>
                            <div class="col-sm-12">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki" <?php if( $user->jenis_kelamin == "Laki-Laki" ) { echo 'selected'; } ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if( $user->jenis_kelamin == "Perempuan" ) { echo 'selected'; } ?>>Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tempat lahir</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="tempat_lahir" placeholder="tempat lahir" value="<?php echo $user->tempat_lahir ?>"></td>
                                 <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" name="tanggal_lahir" id="tgl_lahir" placeholder="Masukan Tanggal Lahir" value="<?php echo $user->tanggal_lahir ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="alamat_rumah" placeholder="alamat" value="<?php echo $user->alamat_rumah ?>"></td>
                                 <?= form_error('alamat_rumah', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Golongan Darah</label>
                            <div class="col-sm-12">
                                <td><input class="form-control" name="golongan_darah" placeholder="golongan darah" value="<?php echo $user->golongan_darah ?>"></td>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="ik ik-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger btn-flat" onclick="window.location.href = '<?= site_url('profil') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                            </div>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>