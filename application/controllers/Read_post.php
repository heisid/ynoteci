<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
    // http://saeedpourali.com/codeigniter-passing-parameters-to-controller-index/
    public function _remap($method, $args) {
        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {
            $this->index($method, $args);
        }
    }

    public function index($id_post) {
        // Loading data from model
        $this->load->model('Post_model');
        $posts = $this->Post_model;
        $full_post = $posts->get_single_post($id_post);
        $tags = $posts->get_tags_by_id($id_post);

        $this->load->view('header_view', array('style' => 'readpost.css', 'page_title' => $full_post['title_post']. " - YNOTE"));
        $this->load->view('navbar_view');
        // print_r($full_post);
        $this->load->view('readpost_view', array('full_post' => $full_post, 'tags' => $tags));
        $this->load->view('tail_view');
    }
}