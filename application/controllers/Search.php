<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function index() {
        $this->load->model('Post_model');
        $post = $this->Post_model;

        $search_string = $this->input->post('search');
        $list_posts = $post->search_post($search_string);

        $this->load->view('header_view', array('title_post' => 'Search - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('search_view', array('list_posts' => $list_posts));
        $this->load->view('tail_view');
    }
}