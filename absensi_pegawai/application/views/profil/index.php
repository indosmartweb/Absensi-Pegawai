<div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body bg-primary">
                <div class="text-center"> 
                    <img src="<?= base_url('assets/uploads/'.$user->foto) ?>" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10 text-light"><?= $user->nama_pekerja ?></h4>
                    <p class="card-subtitle"><?= $user->nip ?></p>
                </div>
            </div>
            <hr class="mb-0 bg-primary"> 
            <div class="card-body"> 
                <small class="text-muted d-block">Jabatan</small>
                <h6><?= $user->nama_jabatan ?></h6> 
                <small class="text-muted d-block">Pangkat</small>
                <h6><?= $user->pangkat ?></h6> 
                <small class="text-muted d-block">Unit Kerja</small>
                <h6><?= $user->unit_kerja ?></h6> 
                <small class="text-muted d-block">Gelar Akademis</small>
                <h6><?= $user->gelar_akademis ?></h6> 
                <small class="text-muted d-block pt-10">Tempat Lahir</small>
                <h6><?= $user->tempat_lahir ?></h6> 
                <small class="text-muted d-block pt-10">Tanggal Lahir</small>
                <h6><?= $user->tanggal_lahir ?></h6> 
                <small class="text-muted d-block pt-10">Alamat Rumah</small>
                <h6><?= $user->alamat_rumah ?></h6> 
                <small class="text-muted d-block pt-10">Nomor KTP</small>
                <h6><?= $user->no_ktp ?></h6> 
                <small class="text-muted d-block pt-10">Jenis Kelamin</small>
                <h6><?= $user->jenis_kelamin ?></h6> 
                <small class="text-muted d-block pt-30">Aksi</small>
                <br/>
                <button class="btn btn-success" onclick="window.location.href = '<?= site_url('profil/edit') ?>'"><i class="ik ik-edit"></i> Edit</button>
                <button class="btn btn-secondary" onclick="window.location.href = '<?= site_url('dashboard') ?>'"><i class="fa fa-undo"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>