<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_post extends CI_Controller {
    // http://saeedpourali.com/codeigniter-passing-parameters-to-controller-index/
    public function _remap($method, $args) {
        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {
            $this->index($method, $args);
        }
    }

    public function index($id_post) {
        $posts = $this->Post_model;
        $full_post = $posts->get_single_post($id_post);
        $tags = $posts->get_tags_by_id($id_post);

        $permission_msg = $this->session->flashdata('permission');
        $modify_permission = $posts->post_permission($id_post);

        $this->load->view('header_view', array('style' => 'readpost.css', 'page_title' => $full_post['title_post']. " - YNOTE"));
        $this->load->view('navbar_view');
        // print_r($full_post);
        $this->load->view('readpost_view', array('full_post' => $full_post, 'tags' => $tags, 'permission_msg' => $permission_msg, 'modify_permission' => $modify_permission));
        $this->load->view('tail_view');
    }
}