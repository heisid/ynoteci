<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function index() {
        $this->load->view('header_view', array('page_title' => 'About Y-Note'));
        $this->load->view('navbar_view');
        $this->load->view('about_view');
        $this->load->view('tail_view');
    }
}
