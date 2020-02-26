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
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP" value="<?= $pegawai->nip ?>">
                        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_pekerja">Nama Pekerja</label>
                        <input type="text" class="form-control" name="nama_pekerja" id="nama_pekerja" placeholder="Masukan Nama Pekerja" value="<?= $pegawai->nama_pekerja ?>">
                        <?= form_error('nama_pekerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="gelar_akademis">Gelar Akademis</label>
                        <input type="text" class="form-control" name="gelar_akademis" id="gelar_akademis" placeholder="Masukan Gelar Akademis" value="<?= $pegawai->gelar_akademis ?>">
                        <?= form_error('gelar_akademis', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= $pegawai->tempat_lahir ?>">
                        <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="<?= $pegawai->tanggal_lahir ?>">
                        <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Masukan Alamat Rumah" cols="30" rows="3"><?= $pegawai->alamat_rumah ?></textarea>
                        <?= form_error('alamat_rumah', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">Nomor KTP</label>
                        <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukan Nomor KTP" value="<?= $pegawai->no_ktp ?>">
                        <?= form_error('no_ktp', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki" <?php if( $pegawai->jenis_kelamin == "Laki-Laki" ) { echo 'selected'; } ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if( $pegawai->jenis_kelamin == "Perempuan" ) { echo 'selected'; } ?>>Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Masukan Golongan Darah" value="<?= $pegawai->golongan_darah ?>">
                        <?= form_error('golongan_darah', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_unit_kerja">Unit Kerja</label>
                        <select name="kode_unit_kerja" id="kode_unit_kerja" class="form-control">
                            <?php foreach( $unit_kerja as $row ) : ?>
                                <option value="<?= $row->kode_unit_kerja ?>" <?php if( $row->kode_unit_kerja == $pegawai->kode_unit_kerja ) { echo 'selected'; } ?>><?= $row->unit_kerja ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_unit_kerja', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_jabatan">Jabatan</label>
                        <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                            <?php foreach( $jabatan as $row ) : ?>
                                <option value="<?= $row->kode_jabatan ?>" <?php if( $row->kode_jabatan == $pegawai->kode_jabatan ) { echo 'selected'; } ?>><?= $row->nama_jabatan ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_jabatan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode_pangkat">Pangkat</label>
                        <select name="kode_pangkat" id="kode_pangkat" class="form-control">
                            <?php foreach( $pangkat as $row ) : ?>
                                <option value="<?= $row->kode_pangkat ?>" <?php if( $row->kode_pangkat == $pegawai->kode_pangkat ) { echo 'selected'; } ?>><?= $row->pangkat ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kode_pangkat', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status_dinas">Status Dinas</label>
                        <select id="status_dinas" class="form-control" name="status_dinas">
                            <option value="1" <?php if( $pegawai->status_dinas == 1 ) { echo 'selected'; } ?>>Aktif</option>
                            <option value="0" <?php if( $pegawai->status_dinas == 0 ) { echo 'selected'; } ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input id="foto" class="form-control-file" type="file" name="foto">
                        <small class="text-info">Kosongkan Jika Tidak Ingin Di Ganti</small>
                        <?php if( isset($error) ) : ?>
                            <small class="text-danger"><?= $error ?></small>
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?= site_url('pegawai') ?>'"><i class="fa fa-backward"></i> Kembali</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>