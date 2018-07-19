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
        $post = $this->Post_model;
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
        redirect(base_url(), 'refresh');
    }
}