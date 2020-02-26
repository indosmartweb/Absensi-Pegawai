<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pangkat');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $this->form_validation->set_rules('kode_pangkat', 'Kode Pangkat', 'trim|required|is_unique[pangkat.kode_pangkat]', [
            'required'  => '%s Harus Di Isi',
            'is_unique' => '%s Sudah Ada'
        ]);
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);

        if( $this->form_validation->run() ) {
            $data = [
                'kode_pangkat'  => $this->input->post('kode_pangkat', true),
                'pangkat'       => $this->input->post('pangkat', true)
            ];
            $this->m_pangkat->tambah($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        }
        
        $pangkat = $this->m_pangkat->index();
        $data = [
            'title'     => 'Data Pangkat',
            'pangkat'   => $pangkat,
            'content'   => 'pangkat/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('kode_pangkat', 'Kode Pangkat', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required', [
            'required'  => '%s Harus Di Isi'
        ]);

        if( $this->form_validation->run() ) {
            $data = [
                'id'            => $id,
                'kode_pangkat'  => $this->input->post('kode_pangkat', true),
                'pangkat'       => $this->input->post('pangkat', true)
            ];
            $this->m_pangkat->update($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('pangkat'));
        }

        $pangkat = $this->m_pangkat->edit($id);
        $data = [
            'title'     => 'Edit Pangkat',
            'pangkat'   => $pangkat,
            'content'   => 'pangkat/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $this->m_pangkat->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('pangkat'));
    }

}

/* End of file Pangkat.php */

?>