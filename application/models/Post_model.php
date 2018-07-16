<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_recent_posts() {
        // this select query doesn't work. why???
        //$this->db->select('title_post', 'date_post', 'content')
        $this->db->limit(5)
                 ->order_by('date_post', 'DESC');
        $query = $this->db->get('posts');
        $result = $query->result_array();

        // Motong sampe 500 karakter
        foreach ($result as &$post) {
            $content_no_html = strip_tags($post['content']);
            $content_crop = substr($content_no_html, 0, 500);
            if (mb_strlen($content_no_html, 'utf8') > 500) {
                $content_crop .= '...';
            }
            $post['content'] = $content_crop;
        }
        // mengantisipasi kalau2 $post dipake lagi nanti
        unset($post);

        return $result;
    }

    public function get_single_post($id_post) {
        $this->db->where('id_post', $id_post);
        $query = $this->db->get('posts');
        return $query->result_array();
    }
}