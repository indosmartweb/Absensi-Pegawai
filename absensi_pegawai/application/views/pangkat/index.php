<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h3>Data Pangkat</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="ik ik-plus"></i> Tambah</button>
                        <button id="editPangkat" class="btn btn-success" style="display: none;"><i class="ik ik-edit"></i> Edit</button>
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
                                <th>Kode Pangkat</th>
                                <th>Pangkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach( $pangkat as $row ) : ?>
                                <tr id="<?= $row->id ?>">
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_pangkat ?></td>
                                    <td><?= $row->pangkat ?></td>
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
                    <label for="kode_pangkat">Pangkat</label>
                    <input type="text" class="form-control" name="kode_pangkat" id="kode_pangkat" placeholder="Masukan Kode Pangkat" value="<?= set_value('kode_pangkat') ?>">
                    <?= form_error('kode_pangkat', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="pangkat">Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukan Pangkat" value="<?= set_value('pangkat') ?>">
                    <?= form_error('pangkat', '<small class="text-danger">', '</small>') ?>
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