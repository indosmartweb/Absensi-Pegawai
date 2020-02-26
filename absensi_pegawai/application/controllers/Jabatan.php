<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jabatan');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'trim|required|is_unique[jabatan.kode_jabatan]', [
            'required'  => '%s Harus Di Isi',
            'is_unique' => '%s Sudah Ada'
        ]);
        $this->form_validation->set_rules('nama_jabatan', 'Jabatan', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);

        if( $this->form_validation->run() ) {
            $data = [
                'kode_jabatan'  => $this->input->post('kode_jabatan', true),
                'nama_jabatan'  => $this->input->post('nama_jabatan', true),
                'keterangan'    => $this->input->post('keterangan', true)
            ];
            $this->m_jabatan->tambah($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        }
        
        $jabatan = $this->m_jabatan->index();
        $data = [
            'title'     => 'Data Jabatan',
            'jabatan'   => $jabatan,
            'content'   => 'jabatan/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);
        $this->form_validation->set_rules('nama_jabatan', 'Jabatan', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);

        if( $this->form_validation->run() ) {
            $data = [
                'id'            => $id,
                'kode_jabatan'  => $this->input->post('kode_jabatan', true),
                'nama_jabatan'  => $this->input->post('nama_jabatan', true),
                'keterangan'    => $this->input->post('keterangan', true)
            ];
            $this->m_jabatan->update($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('jabatan'));
        }

        $jabatan = $this->m_jabatan->edit($id);
        $data = [
            'title'     => 'Edit Jabatan',
            'jabatan'   => $jabatan,
            'content'   => 'jabatan/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $this->m_jabatan->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('jabatan'));
    }

}

/* End of file Jabatan.php */

?>