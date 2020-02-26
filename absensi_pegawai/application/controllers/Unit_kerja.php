<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_unit_kerja');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit_kerja', 'trim|required|is_unique[unit_kerja.kode_unit_kerja]', [
            'is_unique' => '%s Sudah Ada'
        ]);
        $this->form_validation->set_rules('unit_kerja', 'Unit_kerja', 'trim|required');
        $this->form_validation->set_rules('nip_atasan', 'NIP Atasan', 'trim|required');
        $this->form_validation->set_rules('nama_atasan', 'Nama Atasan', 'trim|required');

        if( $this->form_validation->run() ) {
            $data = [
                'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                'unit_kerja'        => $this->input->post('unit_kerja', true),
                'nip_atasan'        => $this->input->post('nip_atasan', true),
                'nama_atasan'       => $this->input->post('nama_atasan', true),
                'keterangan'        => $this->input->post('keterangan', true)
            ];
            $this->m_unit_kerja->tambah($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        }
        
        $unit_kerja = $this->m_unit_kerja->index();
        $data = [
            'title'     => 'Data Unit_kerja',
            'unit_kerja'   => $unit_kerja,
            'content'   => 'unit_kerja/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit($id)
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit_kerja', 'trim|required');
        $this->form_validation->set_rules('unit_kerja', 'Unit_kerja', 'trim|required');
        $this->form_validation->set_rules('nip_atasan', 'NIP Atasan', 'trim|required');
        $this->form_validation->set_rules('nama_atasan', 'Nama Atasan', 'trim|required');

        if( $this->form_validation->run() ) {
            $data = [
                'id'                => $id,
                'kode_unit_kerja'   => $this->input->post('kode_unit_kerja', true),
                'unit_kerja'        => $this->input->post('unit_kerja', true),
                'nip_atasan'        => $this->input->post('nip_atasan', true),
                'nama_atasan'       => $this->input->post('nama_atasan', true),
                'keterangan'        => $this->input->post('keterangan', true)
            ];
            $this->m_unit_kerja->update($data);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('unit_kerja'));
        }

        $unit_kerja = $this->m_unit_kerja->edit($id);
        $data = [
            'title'     => 'Edit Unit_kerja',
            'unit_kerja'   => $unit_kerja,
            'content'   => 'unit_kerja/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $this->m_unit_kerja->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('unit_kerja'));
    }

}

/* End of file Unit_kerja.php */

?>