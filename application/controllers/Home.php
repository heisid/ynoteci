<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        $posts = $this->Post_model;
        $recent_posts = $posts->get_recent_posts();
        // from login
        $logged_in_msg = $this->session->flashdata('logged_in_msg');

        $this->load->view('header_view', array('page_title' => 'YNOTE'));
        $this->load->view('navbar_view');
        $this->load->view('home_view', array('recent_post' => $recent_posts, 'logged_in_msg' => $logged_in_msg));
        $this->load->view('tail_view');
    }
}