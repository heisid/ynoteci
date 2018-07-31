<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function _remap($method, $args) {
        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {
            $this->index($method, $args);
        }
    }

    public function index($username) {
        $user_data = $this->User_model->get_user_detail();

        $this->load->view('header_view', array('page_title' => 'Profile'));
        $this->load->view('navbar_view');
        $this->load->view('profile_view', array('user_data' => $user_data));
        $this->load->view('tail_view');
    }
}