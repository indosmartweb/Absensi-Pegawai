<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Profil extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->auth->cek_login();
	}
    
    public function index() {
		$pegawai = $this->m_pegawai->detail($this->session->userdata('id'));
        $data = [
            'title'     => 'profil',
            'user'      => $pegawai,
            'content'   => 'profil/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
	public function edit () {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('nama_pekerja', 'Nama Pekerja', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'trim|required');

        if( $this->form_validation->run() ) {
            if ( empty($_FILES['foto']['name']) ) {
            $data = [
                'id'             => $this->session->userdata('id'),
                'nama_pekerja'   => $this->input->post('nama_pekerja', true),
                'alamat_rumah'   => $this->input->post('alamat_rumah', true),
                'username'       => $this->input->post('username', true),
                'tanggal_lahir'  => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                'tempat_lahir'   => $this->input->post('tempat_lahir', true),
                'no_ktp'         => $this->input->post('no_ktp', true),
                'golongan_darah' => $this->input->post('golongan_darah', true),
                'jenis_kelamin'  => $this->input->post('jenis_kelamin', true)

            ];
            $this->m_pegawai->update($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('profil'));
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
                    $user = $this->m_profil->index();
                    $data = [
                        'title'         => 'Profil',
                        'user'          => $user,
                        'error'         => $error,
                        'content'       => 'profil/index'
                    ];
                    $this->load->view('layout/wrapper', $data, FALSE);
                }
                else{
                    $uploadData = $this->upload->data();
                    $data = [
                        'id'                => $this->session->userdata('id'),
                        'nama_pekerja'      => $this->input->post('nama_pekerja', true),
                        'tempat_lahir'      => $this->input->post('tempat_lahir', true),
                        'tanggal_lahir'     => date('Y-m-d', strtotime($this->input->post('tanggal_lahir', true))),
                        'alamat_rumah'      => $this->input->post('alamat_rumah', true),
                        'no_ktp'            => $this->input->post('no_ktp', true),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                        'golongan_darah'    => $this->input->post('golongan_darah', true),
                        'foto'              => $uploadData['file_name']
                    ];
                    $pegawai = $this->m_pegawai->detail($id);
                    unlink('./assets/uploads/'.$pegawai->foto);
                    $this->m_pegawai->update($data);
                    $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
                    redirect(site_url('profil'));
                }
            }
        }

		$pegawai = $this->m_pegawai->detail($this->session->userdata('id'));
        $data = [
            'title'     => 'profil',
            'user'      => $pegawai,
            'content'   => 'profil/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
	public function edi($id)
    {
        

        $user = $this->m_profil->edit($this->session->userdata('id'));
        $data = [
            'title'     => 'User',
            'user'   => $user,
            'content'   => 'profil/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

 ?>