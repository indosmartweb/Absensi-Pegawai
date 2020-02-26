<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_message('required', '%s Harus Di Isi');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if( $this->form_validation->run() ) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $this->auth->login($username, $password);
        }
        $data['title']  = 'Login';
        $this->load->view('login/index', $data, FALSE);
    }

    public function logout()
    {
        $this->auth->logout();
    }

}

/* End of file Login.php */

?>