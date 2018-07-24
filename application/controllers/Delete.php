<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {
    public function index() {
        $id_post = $this->input->post('id_post');
        $post = $this->Post_model;

        if (!$post->delete_permission($id_post)) {
            $read_link = 'read_post/'.$id_post;
            $this->session->set_flashdata('permission', 'You are not allowed to delete this post');
            redirect(site_url($read_link));
        }

        $post->delete_post($id_post);
        redirect(site_url(), 'refresh');
    }
}