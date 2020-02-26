<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function login($username, $password)
    {
        $user = $this->ci->m_pegawai->login($username, $password);
        if ( $user ) {
            $data = [
                'id'        => $user->id,
                'username'  => $username
            ];
            $this->ci->session->set_userdata( $data );
            redirect(site_url('dashboard'), 'refresh');
        }  else {
            $this->ci->session->set_flashdata('error', 'Username atau Password Salah');
        }
    }

    public function cek_login()
    {
        if ( $this->ci->session->userdata('username') == '' ) {
            $this->ci->session->set_flashdata('warning', 'Anda Belum Login!!');
            redirect(site_url('login'), 'refresh');
        }
    }

    public function logout()
    {
        $this->ci->session->sess_destroy();
        $this->ci->session->set_flashdata('success', 'Anda Berhasil Logout');
        redirect(site_url('login'));
    }

}

/* End of file Auth.php */

?>