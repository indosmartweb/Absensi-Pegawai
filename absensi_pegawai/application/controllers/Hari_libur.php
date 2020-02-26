<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_libur extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hari_libur');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $hari_libur = $this->m_hari_libur->index();
        $data = [
            'title'         => 'Hari Libur',
            'hari_libur'    => $hari_libur,
            'content'       => 'hari_libur/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal', 'Hari', 'trim|required', ['required' => '%s Harus Di Isi']);
        
        if ( $this->form_validation->run() ) {
            if ( isset($_POST['keterangan']) ) {
                $object = [
                    'tanggal'       => date('Y-m-d', strtotime($this->input->post('tanggal', true))),
                    'keterangan'    => $this->input->post('keterangan', true)
                ];
            } else {
                $object['tanggal'] = $this->input->post('tanggal', true);
            }

            $this->m_hari_libur->tambah($object);
            $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
            redirect(site_url('hari_libur'));
        } 

        $data = [
            'title'         => 'Hari Libur',
            'content'       => 'hari_libur/tambah'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function edit($id)
    {
        $this->form_validation->set_rules('tanggal', 'Hari', 'trim|required', ['required' => '%s Harus Di Isi']);
        
        if ( $this->form_validation->run() ) {
            if ( isset($_POST['keterangan']) ) {
                $object = [
                    'id'            => $id,
                    'tanggal'       => date('Y-m-d', strtotime($this->input->post('tanggal', true))),
                    'keterangan'    => $this->input->post('keterangan', true)
                ];
            } else {
                $object = [
                    'id'        => $id,
                    'tanggal'   =>date('Y-m-d', strtotime($this->input->post('tanggal', true)))
                ];
            }

            $this->m_hari_libur->update($object);
            $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
            redirect(site_url('hari_libur'));
        } 

        $hari_libur = $this->m_hari_libur->edit($id);
        $data = [
            'title'         => 'Hari Libur',
            'hari_libur'    => $hari_libur,
            'content'       => 'hari_libur/edit'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function hapus($id)
    {
        $this->m_hari_libur->hapus($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect(site_url('hari_libur'));
    }

}

/* End of file Hari_libur.php */

?>