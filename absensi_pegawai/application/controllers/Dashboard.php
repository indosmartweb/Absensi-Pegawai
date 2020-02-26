<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_presensi');
        $this->auth->cek_login();
    }
    
    public function index()
    {
        $this->form_validation->set_rules('bulan', 'Bulan', 'trim|required');
        
        if ( $this->form_validation->run() ) {
            $user         = $this->m_pegawai->detail($this->session->userdata('id'));
            $pegawai_dash = $this->m_pegawai->index();
            $data = [
                'title'         => 'Dashboard',
                'user'          => $user,
                'bulan'         => $this->input->post('bulan'),
                'tahun'         => $this->input->post('tahun'),
                'pegawai_dash'  => $pegawai_dash,
                'content'       => 'dashboard/index'
            ];
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $user  = $this->m_pegawai->detail($this->session->userdata('id'));
            $data = [
                'title'         => 'Dashboard',
                'user'          => $user,
                'content'       => 'dashboard/index'
            ];
            $this->load->view('layout/wrapper', $data, FALSE);
        }

    }

}

/* End of file Dashboard.php */

?>