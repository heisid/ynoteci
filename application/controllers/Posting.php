<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {
    public function new_post() {
        $this->load->view('header_view', array('page_title'=>'New Post', 'style' => 'posting.css'));
        $this->load->view('navbar_view');
        $this->load->view('newpost_view');
        $this->load->view('tail_view');
    }

    public function edit_post($id_post) {
        $this->load->model('Post_model');
        $post = $this->Post_model;
        $post_data = $post->get_single_post($id_post);
        
        $this->load->view('header_view', array('page_title' => $post_data['title_post'], 'style' => 'posting.css'));
        $this->load->view('navbar_view');
        $this->load->view('edit_view', $post_data);
        $this->load->view('tail_view');
    }

    public function save_post() {
        $post_data = $this->input->post();

        $this->load->model('Post_model');
        $post = $this->Post_model;
        // print_r($post_data);
        $post->save_post($post_data);
        redirect(base_url(), 'refresh');
    }

}