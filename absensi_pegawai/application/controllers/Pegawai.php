<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jabatan');
        $this->load->model('m_pangkat');
        $this->load->model('m_unit_kerja');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $pegawai = $this->m_pegawai->index();
        $data = [
            'title'         => 'Data Pegawai',
            'pegawai'       => $pegawai,
            'content'       => 'pegawai/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function detail($id)
    {
        $pegawai    = $this->m_pegawai->detail($id);
        $data = [
            'title'         => 'Edit Pegawai',
            'pegawai'       => $pegawai,
            'content'       => 'pegawai/detail'
        ]; 
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[pegawai.nip]', [
            'is_unique' => '%s Sudah Ada'
        ]);
        $this->form_validation->set_rules('nama_pekerja', 'Nama Pekerja', 'trim|required');
        $this->form_validation->set_rules('gelar_akademis', 'Gelar Akademis', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pegawai.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        
        if ( $this->form_validation->run() ) {
            if ( empty($_FILES['foto']['name']) ) {
                $data = [
                    'nip'               => $this->input->post('nip', true),
                    'nama_pekerja'      => $this->input->post('nama_pekerja', true),
                    'gelar_akademis'    => $this->input->post('gelar_akademis', true),
                    'tempat_lahir'      => $this->input->post('tempat_lahir', true),
                    'tanggal_lahir'     => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                    'alamat_rumah'      => $this->input->post('alamat_rumah', true),
                    'no_ktp'            => $this->input->post('no_ktp', true),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                    'golongan_darah'    => $this->input->post('golongan_darah', true),
                    'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                    'kode_jabatan'      => $this->input->post('kode_jabatan', true),
                    'kode_pangkat'      => $this->input->post('kode_pangkat', true),
                    'status_dinas'      => $this->input->post('status_dinas', true),
                    'is_deleted'        => 0,
                    'foto'              => 'default.png',
                    'user_id'           => 0,
                    'username'          => $this->input->post('username', true),
                    'password'          => sha1($this->input->post('password', true))
                ];
                $this->m_pegawai->tambah($data);
                $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
                redirect(site_url('pegawai'));
            } else {
                $config['file_ext_tolower'] = true;
                $config['file_name']        = date('YmdHis');
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'gif|jpg|png|svg|jpeg';
                $config['max_size']         = '3000';
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('foto') ) {
                    $error = $this->upload->display_errors();
                    $jabatan    = $this->m_jabatan->index();
                    $pangkat    = $this->m_pangkat->index();
                    $unit_kerja = $this->m_unit_kerja->index();
                    $data = [
                        'title'         => 'Tambah Pegawai',
                        'jabatan'       => $jabatan,
                        'pangkat'       => $pangkat,
                        'unit_kerja'    => $unit_kerja,
                        'error'         => $error,
                        'content'       => 'pegawai/tambah'
                    ];
                    $this->load->view('layout/wrapper', $data, FALSE);
                }
                else{
                    $uploadData = $this->upload->data();
                    $data = [
                        'nip'               => $this->input->post('nip', true),
                        'nama_pekerja'      => $this->input->post('nama_pekerja', true),
                        'gelar_akademis'    => $this->input->post('gelar_akademis', true),
                        'tempat_lahir'      => $this->input->post('tempat_lahir', true),
                        'tanggal_lahir'     => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                        'alamat_rumah'      => $this->input->post('alamat_rumah', true),
                        'no_ktp'            => $this->input->post('no_ktp', true),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                        'golongan_darah'    => $this->input->post('golongan_darah', true),
                        'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                        'kode_jabatan'      => $this->input->post('kode_jabatan', true),
                        'kode_pangkat'      => $this->input->post('kode_pangkat', true),
                        'status_dinas'      => $this->input->post('status_dinas', true),
                        'is_deleted'        => 0,
                        'foto'              => $uploadData['file_name'],
                        'user_id'           => 0,
                        'username'          => $this->input->post('username', true),
                        'password'          => sha1($this->input->post('password', true))
                    ];
                    $this->m_pegawai->tambah($data);
                    $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
                    redirect(site_url('pegawai'));
                }
            }
        }

        $jabatan    = $this->m_jabatan->index();
        $pangkat    = $this->m_pangkat->index();
        $unit_kerja = $this->m_unit_kerja->index();
        $data = [
            'title'         => 'Tambah Pegawai',
            'jabatan'       => $jabatan,
            'pangkat'       => $pangkat,
            'unit_kerja'    => $unit_kerja,
            'content'       => 'pegawai/tambah'
        ]; 
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit($id)
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('nama_pekerja', 'Nama Pekerja', 'trim|required');
        $this->form_validation->set_rules('gelar_akademis', 'Gelar Akademis', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'trim|required');
        
        if ( $this->form_validation->run() ) {
            if ( empty($_FILES['foto']['name']) ) {
                $data = [
                    'id'                => $id,
                    'nip'               => $this->input->post('nip', true),
                    'nama_pekerja'      => $this->input->post('nama_pekerja', true),
                    'gelar_akademis'    => $this->input->post('gelar_akademis', true),
                    'tempat_lahir'      => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                    'tanggal_lahir'     => $this->input->post('tanggal_lahir', true),
                    'alamat_rumah'      => $this->input->post('alamat_rumah', true),
                    'no_ktp'            => $this->input->post('no_ktp', true),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                    'golongan_darah'    => $this->input->post('golongan_darah', true),
                    'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                    'kode_jabatan'      => $this->input->post('kode_jabatan', true),
                    'kode_pangkat'      => $this->input->post('kode_pangkat', true),
                    'status_dinas'      => $this->input->post('status_dinas', true),
                    'is_deleted'        => 0,
                    'foto'              => 'default.png',
                    'user_id'           => 0
                ];
                $this->m_pegawai->update($data);
                $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
                redirect(site_url('pegawai'));
            } else {
                $config['file_ext_tolower'] = true;
                $config['file_name']        = date('YmdHis');
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'gif|jpg|png|svg|jpeg';
                $config['max_size']         = '3000';
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';
                
                $this->load->library('upload', $config);
                
                if ( !$this->upload->do_upload('foto') ) {
                    $error = $this->upload->display_errors();
                    $jabatan    = $this->m_jabatan->index();
                    $pangkat    = $this->m_pangkat->index();
                    $unit_kerja = $this->m_unit_kerja->index();
                    $data = [
                        'title'         => 'Edit Pegawai',
                        'jabatan'       => $jabatan,
                        'pangkat'       => $pangkat,
                        'unit_kerja'    => $unit_kerja,
                        'error'         => $error,
                        'content'       => 'pegawai/edit'
                    ];
                    $this->load->view('layout/wrapper', $data, FALSE);
                }
                else{
                    $uploadData = $this->upload->data();
                    $data = [
                        'id'                => $id,
                        'nip'               => $this->input->post('nip', true),
                        'nama_pekerja'      => $this->input->post('nama_pekerja', true),
                        'gelar_akademis'    => $this->input->post('gelar_akademis', true),
                        'tempat_lahir'      => $this->input->post('tempat_lahir', true),
                        'tanggal_lahir'     => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                        'alamat_rumah'      => $this->input->post('alamat_rumah', true),
                        'no_ktp'            => $this->input->post('no_ktp', true),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                        'golongan_darah'    => $this->input->post('golongan_darah', true),
                        'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                        'kode_jabatan'      => $this->input->post('kode_jabatan', true),
                        'kode_pangkat'      => $this->input->post('kode_pangkat', true),
                        'status_dinas'      => $this->input->post('status_dinas', true),
                        'is_deleted'        => 0,
                        'foto'              => $uploadData['file_name'],
                        'user_id'           => 0
                    ];
                    $pegawai = $this->m_pegawai->detail($id);
                    unlink('./assets/uploads/'.$pegawai->foto);
                    $this->m_pegawai->update($data);
                    $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
                    redirect(site_url('pegawai'));
                }
            }
        }

        $jabatan    = $this->m_jabatan->index();
        $pangkat    = $this->m_pangkat->index();
        $unit_kerja = $this->m_unit_kerja->index();
        $pegawai    = $this->m_pegawai->detail($id);
        $data = [
            'title'         => 'Edit Pegawai',
            'pegawai'       => $pegawai,
            'jabatan'       => $jabatan,
            'pangkat'       => $pangkat,
            'unit_kerja'    => $unit_kerja,
            'content'       => 'pegawai/edit'
        ]; 
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $pegawai = $this->m_pegawai->detail($id);
        unlink('./assets/uploads/'.$pegawai->foto);
        $this->m_pegawai->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('pegawai'));
    }

}

/* End of file Pegawai.php */

?>