<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|matches[kon_pass]', [
            'matches' => 'Konfirmasi Password Tidak Sama'
        ]);
        $this->form_validation->set_rules('kon_pass', 'Konfirmasi Password', 'trim|required|matches[new_password]');
        
        if ( $this->form_validation->run() ) {
            $password = $this->input->post('old_password');
            $cek      = $this->m_pegawai->cek_password($password);
            if( $cek ) {
                $object = [
                    'id'        => $this->session->userdata('id'),
                    'password'  => sha1($password)
                ];
                $this->m_pegawai->update($object);
                $this->session->set_flashdata('success', 'Ganti Password Berhasil');
                redirect(site_url('ganti_password'));
            } else {
                $error = 'Password Lama Tidak Sesuai';
                $data = [
                    'title'     => 'Ganti Password',
                    'error'     => $error,
                    'content'   => 'ganti_password/index'
                ];
                $this->load->view('layout/wrapper', $data, FALSE);
            }
        } else {
            $data = [
                'title'     => 'Ganti Password',
                'content'   => 'ganti_password/index'
            ];
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

}

/* End of file Ganti_password.php */

?>