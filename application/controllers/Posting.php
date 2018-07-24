<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (empty($this->session->userdata('logged_in'))) {
            redirect(site_url());
        }
    }

    public function new_post() {
        $this->load->view('header_view', array('page_title'=>'New Post', 'style' => 'posting.css'));
        $this->load->view('navbar_view');
        $this->load->view('newpost_view');
        $this->load->view('tail_view');
    }

    public function edit_post($id_post) {
        $post = $this->Post_model;

        if (!$post->edit_permission($id_post)) {
            $read_link = 'read_post/'.$id_post;
            $this->session->set_flashdata('permission', 'You are not allowed to edit this post');
            redirect(site_url($read_link));
        }

        $post_data = $post->get_single_post($id_post);
        $tags = $post->get_tags_by_id($id_post);

        $tags_array = array();
        foreach ($tags as $t) {
            $tags_array[] = $t['tag'];
        }
        $tags_string = implode(",", $tags_array);
        
        $this->load->view('header_view', array('page_title' => $post_data['title_post'], 'style' => 'posting.css'));
        $this->load->view('navbar_view');
        $this->load->view('edit_view', array('post_data' => $post_data, 'tags_string' => $tags_string));
        $this->load->view('tail_view');
    }

    public function save_post() {
        $post_data = $this->input->post();

        $post = $this->Post_model;
        if (empty($post_data['id_post'])) {
            $post->save_post($post_data);
        } else {
            $post->update_post($post_data);
        }
        redirect(site_url(), 'refresh');
    }
}