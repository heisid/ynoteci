<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index() {
        if(empty($this->session->userdata('logged_in'))) {
            redirect(site_url());
        }

        $user_data = $this->User_model->get_user_detail();
        $username = $this->session->userdata('username');
        $posts_list = $this->Post_model->posts_by_author($username);

        $user_data['posts_list'] = $posts_list;

        $this->load->view('header_view', array('page_title' => 'Profile'));
        $this->load->view('navbar_view');
        $this->load->view('profile_view', array('user_data' => $user_data));
        $this->load->view('tail_view');
    }
}