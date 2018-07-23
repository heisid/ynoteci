<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    public function index() {
        $this->load->view('header_view', array('page_title' => 'Sign Up'));
        $this->load->view('navbar_view');
        $this->load->view('signup_view');
        $this->load->view('tail_view');
    }

    private function check_input($userdata) {
        $chk = TRUE;
        $this->session->set_flashdata($userdata);
        $error_msg = array();
        
        if ($userdata['password'] != $userdata['confirm_password']) {
            $error_msg['pass_fail'] = 'Your password does not match';
            $chk = FALSE;
        }
        
        if ($this->User_model->check_user($userdata['username'])) {
            $error_msg['username_taken'] = 'The username has been taken';
            $chk = FALSE;
        }

        $this->session->set_flashdata('error_msg', $error_msg);

        if (!$chk) {
            redirect(site_url('signup'), 'refresh');
        }

    }

    public function add_user() {
        $new_user_data = $this->input->post();
        $this->check_input($new_user_data);
        // $this->User_model->add_user($new_user_data);
        // redirect(site_url('login'), 'refresh');
    }
}