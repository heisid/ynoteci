<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function index() {
        $post = $this->Post_model;

        $search_string = $this->input->get('search');
        $list_posts = $post->search_post($search_string);

        $this->load->view('header_view', array('page_title' => 'Search - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('search_view', array('search_string' => $search_string, 'list_posts' => $list_posts));
        $this->load->view('tail_view');
    }
}