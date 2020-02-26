<?php 
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_kerja extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_waktu_kerja');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $waktu_kerja = $this->m_waktu_kerja->index();
        $data = [
            'title'         => 'Data Waktu Kerja',
            'waktu_kerja'   => $waktu_kerja,
            'content'       => 'waktu_kerja/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('hari', 'Hari', 'trim|required');
        $this->form_validation->set_rules('masuk_kerja', 'Masuk Kerja', 'trim|required');
        $this->form_validation->set_rules('pulang_kerja', 'Pulang Kerja', 'trim|required');
        
        if ( $this->form_validation->run() ) {
            $object = [
                'hari'          => $this->input->post('hari', true),
                'masuk_kerja'   => date('H:i:s', strtotime($this->input->post('masuk_kerja', true))),
                'pulang_kerja'  => date('H:i:s', strtotime($this->input->post('pulang_kerja', true))),
                'is_deleted'    => 0
            ];
            $this->m_waktu_kerja->tambah($object);
            $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
            redirect(site_url('waktu_kerja'));
        }

        $data = [
            'title'         => 'Tambah Waktu Kerja',
            'content'       => 'waktu_kerja/tambah'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function edit($id)
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('hari', 'Hari', 'trim|required');
        $this->form_validation->set_rules('masuk_kerja', 'Masuk Kerja', 'trim|required');
        $this->form_validation->set_rules('pulang_kerja', 'Pulang Kerja', 'trim|required');
        
        if ( $this->form_validation->run() ) {
            $object = [
                'hari'          => $this->input->post('hari', true),
                'masuk_kerja'   => date('H:i:s', strtotime($this->input->post('masuk_kerja', true))),
                'pulang_kerja'  => date('H:i:s', strtotime($this->input->post('pulang_kerja', true))),
                'is_deleted'    => 0
            ];
            $this->m_waktu_kerja->update($id, $object);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('waktu_kerja'));
        }

        $waktu_kerja = $this->m_waktu_kerja->edit($id);
        $data = [
            'title'         => 'Edit Waktu Kerja',
            'waktu_kerja'   => $waktu_kerja, 
            'content'       => 'waktu_kerja/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $this->m_waktu_kerja->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('waktu_kerja'));
    }

}

/* End of file Waktu_kerja.php */
 
?>