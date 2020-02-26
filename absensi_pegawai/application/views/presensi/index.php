<?php $user = $this->m_pegawai->detail($this->session->userdata('id')) ?>
<?php $hari = hari() ?>
<?php $bulan = bulan() ?>
<div class="row ">
    <div class="col-md-12 col-12">
        <div class="card" >
            <div class="card-header d-block">
                <div class="row">
                    <div class="col-6">
                        <h2>Data Presensi</h2>
                        <a href="<?= site_url('presensi/export') ?>" class="btn btn-primary"><i class="fas fa-file-excel fa-fw"></i> Export</a>
                    </div>
                    <div class="col-6 text-right">
                        <strong class="h4"><?= $user->nama_pekerja ?></strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Keterlambatan</th>
                                <th>Pulang Awal</th>
                                <th>Keterangan</th>
                                <th>Jumlah Jam Kerja</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach( $presensi as $row ) : ?>
                                <?php $h  = $hari[date('N', strtotime($row->tanggal))] ?>
                                <?php $t  = date('d', strtotime($row->tanggal)) ?>
                                <?php $b  = $bulan[date('n', strtotime($row->tanggal)) - 1] ?>
                                <?php $th = date('Y', strtotime($row->tanggal)) ?>
                                <tr>
                                    <td><?= $h.', '.$t.'-'.$b.'-'.$th ?></td>
                                    <?php if( $row->jam_masuk == null ) : ?>
                                        <td>-</td>
                                    <?php else : ?>
                                        <td><?= $row->jam_masuk ?></td>
                                    <?php endif ?>
                                    <?php if( $row->jam_pulang == null ) : ?>
                                        <td>-</td>
                                    <?php else : ?>
                                        <td><?= $row->jam_pulang ?></td>
                                    <?php endif ?>
                                    <?php if( $row->terlambat == null ) : ?>
                                        <td>-</td>
                                    <?php else : ?>
                                        <td><?= $row->terlambat ?></td>
                                    <?php endif ?>
                                    <?php if( $row->pulang_awal == null ) : ?>
                                        <td>-</td>
                                    <?php else : ?>
                                        <td><?= $row->pulang_awal ?></td>
                                    <?php endif ?>
                                    <td><?= $row->keterangan ?></td>
                                    <td><?= $row->jumlah_jam_kerja ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>