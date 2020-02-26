<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h3>Data Unit Kerja</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="ik ik-plus"></i> Tambah</button>
                        <button id="editUnitKerja" class="btn btn-success" style="display: none;"><i class="ik ik-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-hapus" style="display: none;"><i class="ik ik-trash"></i> Hapus</button>
                        <button class="btn btn-secondary" id="batal" style="display: none;"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Unit Kerja</th>
                                <th>Unit Kerja</th>
                                <th>Nip Atasan</th>
                                <th>Nama Atasan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach( $unit_kerja as $row ) : ?>
                                <tr id="<?= $row->id ?>">
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_unit_kerja ?></td>
                                    <td><?= $row->unit_kerja ?></td>
                                    <td><?= $row->nip_atasan ?></td>
                                    <td><?= $row->nama_atasan ?></td>
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
                    <label for="kode_unit_kerja">Kode Unit Kerja</label>
                    <input type="text" class="form-control" name="kode_unit_kerja" id="kode_unit_kerja" placeholder="Masukan Kode Unit Kerja" value="<?= set_value('kode_unit_kerja') ?>">
                    <?= form_error('kode_unit_kerja', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="unit_kerja">Unit Kerja</label>
                    <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Masukan Unit Kerja" value="<?= set_value('unit_kerja') ?>">
                    <?= form_error('unit_kerja', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nip_atasan">NIP Atasan</label>
                    <input type="text" class="form-control" name="nip_atasan" id="nip_atasan" placeholder="Masukan NIP Atasan" value="<?= set_value('nip_atasan') ?>">
                    <?= form_error('nip_atasan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nama_atasan">Nama Atasan</label>
                    <input type="text" class="form-control" name="nama_atasan" id="nama_atasan" placeholder="Masukan Nama Atasan" value="<?= set_value('nama_atasan') ?>">
                    <?= form_error('nama_atasan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" cols="30" rows="3"><?= set_value('keterangan') ?></textarea>
                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
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