<?php $user = $this->m_pegawai->detail($this->session->userdata('id')) ?>
<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
               
            </div>
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <h6 id="clock" style="position: relative; top: 5px;"></h6>
                    </div>
                </div>
                <div class="dropdown">
                    <span class="h4"><?= $user->username ?></span>
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?= base_url('assets/uploads/'.$user->foto) ?>" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= site_url('profil') ?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                        <a class="dropdown-item" href="<?= site_url('ganti_password') ?>"><i class="ik ik-lock dropdown-icon"></i> Ganti Password</a>
                        <a class="dropdown-item" href="<?= site_url('login/logout') ?>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>