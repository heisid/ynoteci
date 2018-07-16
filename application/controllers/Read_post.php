<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_post extends CI_Controller {
    private $id_post;
    public function __construct($id_post) {
        parent::__construct();
        $this->id_post = $id_post;
    }

    public function index() {
        // Loading data from model
        $this->load->model('Post_model');
        $posts = $this->Post_model;
        $full_post = $posts->get_single_post($this->id_post);

        $this->load->view('header_view');
        $this->load->view('navbar_view');
        $this->load->view('readpost_view', array('full_post' => $full_post));
        $this->load->view('tail_view');
    }
}