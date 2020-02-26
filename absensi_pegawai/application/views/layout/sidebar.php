<?php $user = $this->m_pegawai->detail($this->session->userdata('id')) ?>
<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <span class="text">Absensi</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item <?php if($title == "Dashboard") { echo 'aktif'; } ?>">
                        <a href="<?= site_url('dashboard') ?>"><i class="ik ik-home"></i><span>Dashboard</span></a>
                    </div>
                    <div class="nav-item <?php if( isset($absen) ) { echo 'aktif'; } ?>">
                        <a href="<?= site_url('absen') ?>"><i class="ik ik-edit"></i><span>Absen</span></a>
                    </div>
                    <div class="nav-item <?php if( isset($presensi) ) { echo 'aktif'; } ?>">
                        <a href="<?= site_url('presensi') ?>"><i class="ik ik-list"></i><span>Presensi</span></a>
                    </div>
                    <?php if( $user->user_id == 1 ) : ?>
                    <div class="nav-item <?php if( isset($pegawai) ) { echo 'aktif'; } ?>">
                        <a href="<?= site_url('pegawai') ?>"><i class="ik ik-user"></i><span>Data Pegawai</span></a>
                    </div>
                    <div class="nav-item has-sub <?php if( isset($jabatan) ) { echo 'aktif'; } ?> <?php if( isset($pangkat) ) { echo 'aktif'; } ?> <?php if( isset($unit_kerja) ) { echo 'aktif'; } ?> <?php if( isset($waktu_kerja) ) { echo 'aktif'; } ?> <?php if( isset($libur) ) { echo 'aktif'; } ?>">
                        <a href="#"><i class="ik ik-layers"></i><span>Master</span></a>
                        <div class="submenu-content">
                            <a href="<?= site_url('waktu_kerja') ?>" class="menu-item"><i class="ik ik-box"></i><span>Data Waktu Kerja</span></a>
                            <a href="<?= site_url('hari_libur') ?>" class="menu-item"><i class="ik ik-box"></i><span>Data Libur</span></a>
                            <a href="<?= site_url('jabatan') ?>" class="menu-item"><i class="ik ik-box"></i><span>Data Jabatan</span></a>
                            <a href="<?= site_url('pangkat') ?>" class="menu-item"><i class="ik ik-box"></i><span>Data Pangkat</span></a>
                            <a href="<?= site_url('unit_kerja') ?>" class="menu-item"><i class="ik ik-box"></i><span>Data Unit Kerja</span></a>
                        </div>
                    </div>
                    <?php endif ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container-fluid">