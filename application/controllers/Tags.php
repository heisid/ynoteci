<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {
    public function index() {
        $model = $this->Post_model;
        $tags = $model->get_list_all_tags();

        $this->load->view('header_view', array('page_title' => 'Tags - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('tags_view', array('tags' => $tags));
        $this->load->view('tail_view');
    }

    public function by_tag($tag) {
        $posts = $this->Post_model;
        $posts_list = $posts->posts_by_tag($tag);

        $this->load->view('header_view', array('page_title' => 'Tags - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('by_tag_view', array('tag' => $tag, 'posts_list' => $posts_list));
        $this->load->view('tail_view');
    }
}
