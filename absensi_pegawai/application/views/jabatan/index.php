<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h3>Data Jabatan</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="ik ik-plus"></i> Tambah</button>
                        <button id="editJabatan" class="btn btn-success" style="display: none;"><i class="ik ik-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-hapus" style="display: none;"><i class="ik ik-trash"></i> Hapus</button>
                        <button class="btn btn-secondary" id="batal" style="display: none;"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="simpletable" class="table table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Jabatan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach( $jabatan as $row ) : ?>
                                <tr id="<?= $row->id ?>">
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_jabatan ?></td>
                                    <td><?= $row->nama_jabatan ?></td>
                                    <td><?= $row->keterangan ?></td>
                                </tr>
                            <?php $no++ ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open() ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode_jabatan">Kode Jabatan</label>
                    <input type="text" class="form-control" name="kode_jabatan" id="kode_jabatan" placeholder="Masukan Kode Jabatan" value="<?= set_value('kode_jabatan') ?>">
                    <?= form_error('kode_jabatan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan" id="jabatan" placeholder="Masukan Jabatan" value="<?= set_value('jabatan') ?>">
                    <?= form_error('jabatan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" cols="30" rows="3"><?= set_value('keterangan') ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>