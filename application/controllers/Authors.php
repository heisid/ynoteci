<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {
    public function index() {
        $authors = $this->User_model->get_list_all_users();

        $this->load->view('header_view', array('page_title' => 'Authors - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('authors_view', array('authors' => $authors));
        $this->load->view('tail_view');
    }

    public function by_author($author) {
        $posts_list = $this->Post_model->posts_by_author($author);

        $this->load->view('header_view', array('page_title' => 'Authors - Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('by_author_view', array('author' => $author, 'posts_list' => $posts_list));
        $this->load->view('tail_view');
    }
}
