<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body bg-primary">
                <div class="text-center"> 
                    <img src="<?= base_url('assets/uploads/'.$pegawai->foto) ?>" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10 text-light"><?= $pegawai->nama_pekerja ?></h4>
                    <p class="card-subtitle"><?= $pegawai->nip ?></p>
                </div>
            </div>
            <hr class="mb-0 bg-primary"> 
            <div class="card-body"> 
                <small class="text-muted d-block">Jabatan</small>
                <h6><?= $pegawai->nama_jabatan ?></h6> 
                <small class="text-muted d-block">Pangkat</small>
                <h6><?= $pegawai->pangkat ?></h6> 
                <small class="text-muted d-block">Unit Kerja</small>
                <h6><?= $pegawai->unit_kerja ?></h6> 
                <small class="text-muted d-block">Gelar Akademis</small>
                <h6><?= $pegawai->gelar_akademis ?></h6> 
                <small class="text-muted d-block pt-10">Tempat Lahir</small>
                <h6><?= $pegawai->tempat_lahir ?></h6> 
                <small class="text-muted d-block pt-10">Tanggal Lahir</small>
                <h6><?= $pegawai->tanggal_lahir ?></h6> 
                <small class="text-muted d-block pt-10">Alamat Rumah</small>
                <h6><?= $pegawai->alamat_rumah ?></h6> 
                <small class="text-muted d-block pt-10">Nomor KTP</small>
                <h6><?= $pegawai->no_ktp ?></h6> 
                <small class="text-muted d-block pt-10">Jenis Kelamin</small>
                <h6><?= $pegawai->jenis_kelamin ?></h6> 
                <small class="text-muted d-block pt-10">Status Dinas</small>
                <?php if( $pegawai->status_dinas == 1 ) : ?>
                    <h6>Aktif</h6> 
                <?php else : ?>
                    <h6>Tidak Aktif</h6> 
                <?php endif ?>
                <small class="text-muted d-block pt-30">Aksi</small>
                <br/>
                <button class="btn btn-success" onclick="window.location.href = '<?= site_url('pegawai/edit/'.$pegawai->id) ?>'"><i class="ik ik-edit"></i> Edit</button>
                <a href="<?= site_url('pegawai/hapus/'.$pegawai->id) ?>" class="btn-hapus btn btn-danger"><i class="ik ik-trash"></i> Hapus</a>
                <button class="btn btn-secondary" onclick="window.location.href = '<?= site_url('pegawai') ?>'"><i class="fa fa-undo"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>