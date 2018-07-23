<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        $this->load->view('header_view', array('title' => 'Login'));
        $this->load->view('navbar_view');
        $this->load->view('login_view');
        $this->load->view('tail_view');
    }

    public function verify_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $access_granted = $this->User_model->verify_user($username, $password);
        if ($access_granted) {
            $this->session->set_userdata($username);
        } else {
            $this->session->set_flashdata('login_failed', 'The username or password you entered was incorrect');
            redirect(site_url('login'), 'refresh');
        }
    }
}