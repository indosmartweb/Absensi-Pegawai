<?php $hari = hari() ?>
<?php $bulan = bulan() ?>
<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h3>Data Hari Libur</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" id="tambahHariLibur"><i class="ik ik-plus"></i> Tambah</button>
                        <button id="editHariLibur" class="btn btn-success" style="display: none;"><i class="ik ik-edit"></i> Edit</button>
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
                                <th>Hari Libur</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach( $hari_libur as $row ) : ?>
                                <?php $h = $hari[date('w', strtotime($row->tanggal))] ?>
                                <?php $t = date('d', strtotime($row->tanggal)) ?>
                                <?php $b = $bulan[date('n', strtotime($row->tanggal))] ?>
                                <?php $th = date('Y', strtotime($row->tanggal)) ?>
                                <tr id="<?= $row->id ?>">
                                    <td><?= $no ?></td>
                                    <td><?= $h.', '.$t.'-'.$b.'-'.$th ?></td>
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