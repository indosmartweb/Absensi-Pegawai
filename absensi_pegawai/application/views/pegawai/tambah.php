<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Tambah Pegawai</h3>
            </div>
            <div class="card-body">
                <?= form_open_multipart() ?>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP" value="<?= set_value('nip') ?>">
                        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_pekerja">Nama Pekerja</label>
                        <input type="text" class="form-control" name="nama_pekerja" id="nama_pekerja" placeholder="Masukan Nama Pekerja" value="<?= set_value('nama_pekerja') ?>">
                        <?= form_error('nama_pekerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="gelar_akademis">Gelar Akademis</label>
                        <input type="text" class="form-control" name="gelar_akademis" id="gelar_akademis" placeholder="Masukan Gelar Akademis" value="<?= set_value('gelar_akademis') ?>">
                        <?= form_error('gelar_akademis', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= set_value('tempat_lahir') ?>">
                        <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                        <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Masukan Alamat Rumah" cols="30" rows="3"><?= set_value('alamat_rumah') ?></textarea>
                        <?= form_error('alamat_rumah', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">Nomor KTP</label>
                        <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukan Nomor KTP" value="<?= set_value('no_ktp') ?>">
                        <?= form_error('no_ktp', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Masukan Golongan Darah" value="<?= set_value('golongan_darah') ?>">
                        <?= form_error('golongan_darah', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_unit_kerja">Unit Kerja</label>
                        <select name="kode_unit_kerja" id="kode_unit_kerja" class="form-control">
                            <?php foreach( $unit_kerja as $row ) : ?>
                                <option value="<?= $row->kode_unit_kerja ?>"><?= $row->unit_kerja ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_unit_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_jabatan">Jabatan</label>
                        <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                            <?php foreach( $jabatan as $row ) : ?>
                                <option value="<?= $row->kode_jabatan ?>"><?= $row->nama_jabatan ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_jabatan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_pangkat">Pangkat</label>
                        <select name="kode_pangkat" id="kode_pangkat" class="form-control">
                            <?php foreach( $pangkat as $row ) : ?>
                                <option value="<?= $row->kode_pangkat ?>"><?= $row->pangkat ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_pangkat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status_dinas">Status Dinas</label>
                        <select id="status_dinas" class="form-control" name="status_dinas">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input id="foto" class="form-control-file" type="file" name="foto">
                        <small class="text-info">Kosongkan Jika Tidak Ingin Di Isi</small>
                        <?php if( isset($error) ) : ?>
                            <small class="text-danger"><?= $error ?></small>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" value="<?= set_value('username') ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Masukan Password" aria-label="Recipient's password" aria-describedby="show-password">
                            <div class="input-group-append">
                                <span class="input-group-text" id="show-password" data-aktif=""><i class="ik ik-eye"></i></span>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo site_url('pegawai') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>