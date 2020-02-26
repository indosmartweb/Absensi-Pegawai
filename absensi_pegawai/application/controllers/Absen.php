<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller
{
	public function __construct() {
		parent::__construct();
        $this->load->model('m_presensi');
        $this->load->model('m_hari_libur');
        $this->load->model('m_waktu_kerja');
        $this->auth->cek_login();
	}
	public function index(){
        $this->form_validation->set_rules('pegawai_id', 'Pegawai Id', 'Required', 'trim|required');
        if ( $this->form_validation->run() ) {
            if ( isset($_POST['masuk']) ) {
                $tgl            = date('Y-m-d', time() + 60 * 60 * 6);
                $jm             = time() + (60 * 60 * 6);
                $hari           = date('N', time() + 60 * 60 * 6);
                $masuk          = $this->m_waktu_kerja->cek_waktu($hari);
                $masuk_kerja    = strtotime($masuk->masuk_kerja);
                $menit          = (int)(($jm - $masuk_kerja) / 60);
                $mnt            = ($jm - $masuk_kerja) / 60;
                $detik          = (int)(($mnt - $menit) * 60);
                
                $terlambat  = '';
                $keterangan = '';
                if($jm > $masuk_kerja){
                    $terlambat  = $menit. ' Menit, '.$detik.' Detik';
                    $keterangan = 'Masuk, Terlambat';
                }else{
                    $terlambat  = null;
                    $keterangan = 'Masuk';
                }
                
                $object = [
                    'pegawai_id'        => $this->input->post('pegawai_id'),
                    'tanggal'           => $tgl,
                    'jam_masuk'         => date('H:i:s', time() + 60 * 60 * 6),
                    'jam_pulang'        => null,
                    'terlambat'         => $terlambat,
                    'pulang_awal'       => null,
                    'keterangan'        => $keterangan,
                    'jumlah_jam_kerja'  => null
                ];

                $pegawai_id     = $this->session->userdata('id');
                $tanggal        = date('Y-m-d', time() + 60 * 60 * 6);
                $cek_absen      = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                if ( !empty($cek_absen) ) {
                    $pegawai_id = $this->input->post('pegawai_id');
                    $tanggal    = date('Y-m-d', time() + 60 * 60 * 6);
                    $this->m_presensi->absen_pulang($pegawai_id, $tanggal, $object);
                    $this->session->set_flashdata('success', 'Absen Berhasil');
                } else {
                    $this->m_presensi->absen_masuk($object);
                    $this->session->set_flashdata('success', 'Absen Berhasil');
                }
            } else {
                $pegawai_id     = $this->session->userdata('id');
                $tanggal        = date('Y-m-d', time() + 60 * 60 * 6);
                $cek_absen      = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                if ( empty($cek_absen) ) {
                    $tgl            = date('Y-m-d', time() + 60 * 60 * 6);
                    $jm             = time() + (60 * 60 * 6);
                    $hari           = date('N', time() + 60 * 60 * 6);
                    $masuk          = $this->m_waktu_kerja->cek_waktu($hari);
                    $masuk_kerja    = strtotime($masuk->masuk_kerja);
                    $menit          = (int)(($jm - $masuk_kerja) / 60);
                    $mnt            = ($jm - $masuk_kerja) / 60;
                    $detik          = (int)(($mnt - $menit) * 60);
                    $terlambat      = $menit. ' Menit, '.$detik.' Detik';
                    $keterangan     = 'Masuk, Terlambat';
                    $object = [
                        'pegawai_id'        => $this->input->post('pegawai_id'),
                        'tanggal'           => $tgl,
                        'jam_masuk'         => null,
                        'jam_pulang'        => date('H:i:s', time() + 60 * 60 * 6),
                        'terlambat'         => $terlambat,
                        'pulang_awal'       => null,
                        'keterangan'        => $keterangan,
                        'jumlah_jam_kerja'  => null
                    ];

                    $pegawai_id     = $this->session->userdata('id');
                    $tanggal        = date('Y-m-d', time() + 60 * 60 * 6);
                    $cek_absen      = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                    $this->m_presensi->absen_masuk($object);
                    $pulang_kerja   = strtotime($masuk->pulang_kerja);
                    $menit          = (int)(($pulang_kerja - $jm) / 60);
                    $mnt            = ($pulang_kerja - $jm) / 60;
                    $detik          = (int)(($mnt - $menit) * 60);
                    $pegawai_id     = $this->session->userdata('id');
                    $tanggal        = date('Y-m-d', time() + 60 * 60 * 6);
                    $cek_absen      = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                    
                    $pulang_awal    = '';
                    if($jm < $pulang_kerja) {
                        $pulang_awal = $menit. ' Menit, '.$detik.' Detik';
                    } else {
                        $pulang_awal = null;
                    }
    
                    $keterangan     = '';
                    if ( ($cek_absen->keterangan == 'Masuk') && ($pulang_awal == $menit. ' Menit, '.$detik.' Detik') ) {
                        $keterangan = 'Masuk, Pulang Awal';
                    } elseif( ($cek_absen->keterangan == 'Masuk') && ($pulang_awal == null) ) {
                        $keterangan = 'Masuk';
                    } elseif( ($cek_absen->keterangan == 'Masuk, Terlambat') && ($pulang_awal == null) ) {
                        $keterangan = 'Masuk, Terlambat';
                    } else {
                        $keterangan = 'Masuk, Terlambat, Pulang Awal';
                    }
    
                    $object = [
                        'pegawai_id'        => $this->input->post('pegawai_id'),
                        'jam_pulang'        => date('H:i:s', time() + 60 * 60 * 6),
                        'pulang_awal'       => $pulang_awal,
                        'keterangan'        => $keterangan
                    ];
                    
                    $pegawai_id = $this->input->post('pegawai_id');
                    $tanggal    = date('Y-m-d', time() + 60 * 60 * 6);
                    $this->m_presensi->absen_pulang($pegawai_id, $tanggal, $object);
                    $this->session->set_flashdata('success', 'Absen Berhasil');
                } else {
                    $tgl            = date('Y-m-d', time() + 60 * 60 * 6);
                    $jm             = time() + (60 * 60 * 6);
                    $hari           = date('N', time() + 60 * 60 * 6);
                    $masuk          = $this->m_waktu_kerja->cek_waktu($hari);
                    $pulang_kerja   = strtotime($masuk->pulang_kerja);
                    $menit          = (int)(($pulang_kerja - $jm) / 60);
                    $mnt            = ($pulang_kerja - $jm) / 60;
                    $detik          = (int)(($mnt - $menit) * 60);
                    $pegawai_id     = $this->session->userdata('id');
                    $tanggal        = date('Y-m-d', time() + 60 * 60 * 6);
                    $cek_absen      = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                    
                    $pulang_awal    = '';
                    if($jm < $pulang_kerja) {
                        $pulang_awal = $menit. ' Menit, '.$detik.' Detik';
                    } else {
                        $pulang_awal = null;
                    }
    
                    $keterangan     = '';
                    if ( ($cek_absen->keterangan == 'Masuk') && ($pulang_awal == $menit. ' Menit, '.$detik.' Detik') ) {
                        $keterangan = 'Masuk, Pulang Awal';
                    } elseif( ($cek_absen->keterangan == 'Masuk') && ($pulang_awal == null) ) {
                        $keterangan = 'Masuk';
                    } elseif( ($cek_absen->keterangan == 'Masuk, Terlambat') && ($pulang_awal == null) ) {
                        $keterangan = 'Masuk, Terlambat';
                    } else {
                        $keterangan = 'Masuk, Terlambat, Pulang Awal';
                    }
    
                    $object = [
                        'pegawai_id'        => $this->input->post('pegawai_id'),
                        'jam_pulang'        => date('H:i:s', time() + 60 * 60 * 6),
                        'pulang_awal'       => $pulang_awal,
                        'keterangan'        => $keterangan
                    ];
                    
                    $pegawai_id = $this->input->post('pegawai_id');
                    $tanggal    = date('Y-m-d', time() + 60 * 60 * 6);
                    $this->m_presensi->absen_pulang($pegawai_id, $tanggal, $object);
                    $absensi            = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
                    $jumlah_detik       = (strtotime($absensi->jam_pulang) - strtotime($absensi->jam_masuk));
                    $jam                = (int)(($jumlah_detik / (60 * 60)) - 1);
                    $j                  = (float)(($jumlah_detik / (60 * 60)) - 1);
                    $m                  = $j - $jam;
                    $menit              = (int)($m * 60);
                    $mnt                = (float)($m * 60);
                    $detik              = (int)(($mnt - $menit) * 60);
                    $jumlah_jam_kerja   = $jam.' Jam, '.$menit.' Menit, '.$detik.' Detik';
                    $object['jumlah_jam_kerja'] = $jumlah_jam_kerja;
                    $this->m_presensi->absen_pulang($pegawai_id, $tanggal, $object);
                    $this->session->set_flashdata('success', 'Absen Berhasil');
                }
            }
        }
        $absen           = $this->m_presensi->index();
        $pegawai_id      = $this->session->userdata('id');
        $hari            = date('N', time() + 60 * 60 * 6);
        $tanggal         = date('Y-m-d', time() + 60 * 60 * 6);
        $masuk           = $this->m_waktu_kerja->cek_waktu($hari);
        $cek_hari_libur  = $this->m_hari_libur->cek_hari_libur($tanggal);
        $cek_absen       = $this->m_presensi->cek_absen($pegawai_id, $tanggal);
        $cek_absen_masuk = $this->m_presensi->cek_absen_masuk($pegawai_id, $tanggal);
        $data = [
            'title'             => 'Absen',
            'absen'             => $absen,
            'masuk'             => $masuk,
            'cek_absen'         => $cek_absen,
            'cek_hari_libur'    => $cek_hari_libur,
            'cek_absen_masuk'   => $cek_absen_masuk,
            'content'           => 'absen/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
	}
}
 ?>