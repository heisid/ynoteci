<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller {
    public function index() {
        $this->load->model('Post_model');
        $posts = $this->Post_model;
        $list_all_posts = $posts->get_list_all_post();

        $this->load->view('header_view', array('page_title' => 'Archive - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('archive_view', array('list_all_posts' => $list_all_posts));
        $this->load->view('tail_view');
    }
}