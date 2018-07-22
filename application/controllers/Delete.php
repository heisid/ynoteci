<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {
    public function index() {
        $id_post = $this->input->post();
        $post = $this->Post_model;
        $post->delete_post($id_post['id_post']);
        redirect(site_url(), 'refresh');
    }
}