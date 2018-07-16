<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_recent_posts() {
        $this->db->select('title_post', 'date_post', 'content')
                 ->limit(5)
                 ->order_by('date_post', 'DESC');
        $query = $this->db->get('posts');
        return $query->result_array();
    }

    public function show_post($id_post) {
        $this->db->where('id_post', $id_post);
        $query = $this->db->get('posts');
        return $query->result_array();
    }
}