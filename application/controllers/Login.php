<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        $this->logged_in();
        $this->load->view('header_view', array('page_title' => 'Login'));
        $this->load->view('navbar_view');
        $this->load->view('login_view');
        $this->load->view('tail_view');
    }

    private function logged_in() {
        if ($this->session->userdata('logged_in')) {
            $username = $this->session->userdata('username');
            $logged_in_msg = 'You have been logged in as '. $username;
            $this->session->set_flashdata('logged_in_msg', $logged_in_msg);
            redirect(site_url());
        }
    }

    public function verify() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $access_granted = $this->User_model->verify_user($username, $password);
        if ($access_granted) {
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('logged_in', TRUE);
            $this->logged_in();
        } else {
            $this->session->set_flashdata('login_failed', 'The username or password you entered was incorrect');
            redirect(site_url('login'), 'refresh');
        }
    }
}