<?php $hari = hari() ?>
<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h3>Data Waktu Kerja</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" id="tambahWaktuKerja"><i class="ik ik-plus"></i> Tambah</button>
                        <button id="editWaktuKerja" class="btn btn-success" style="display: none;"><i class="ik ik-edit"></i> Edit</button>
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
                                <th>Hari</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach( $waktu_kerja as $row ) : ?>
                                <tr id="<?= $row->id ?>">
                                    <td><?= $no ?></td>
                                    <td><?= $hari[$row->hari] ?></td>
                                    <td><?= $row->masuk_kerja ?></td>
                                    <td><?= $row->pulang_kerja ?></td>
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