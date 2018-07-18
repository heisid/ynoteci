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
        // TODO: diganti pake helper text dari CI
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
        return $query->row_array();
    }

    public function get_tags_by_id($id_post) {
        $this->db->from('tags')
                 ->join('posts', 'posts.id_post = tags.id_post')
                 ->where('posts.id_post', $id_post);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_list_all_post() {
        $this->db->select('id_post, title_post, date_post')
                ->order_by('date_post', 'DESC');
        $query = $this->db->get('posts');
        return $query->result_array();
    }

    public function delete_post($id_post) {
        $this->db->where('id_post', $id_post)
                 ->delete('posts');
    }

    private function save_tags($id_post, $tags) {
        $tags = explode(',', $tags);
        foreach($tags as $tag) {
            $this->db->set('id_post', $id_post);
            $this->db->set('tag', $tag);
            $this->db->insert('tags');
        }
    }

    public function save_post($post_data) {
        $this->db->set('title_post', $post_data['title_post']);
        $this->db->set('content', $post_data['content']);
        $this->db->set('date_post', 'NOW()', FALSE);
        $this->db->insert('posts');
        // last autoincrement integer
        $id_post = $this->db->insert_id();

        $tags = explode(',', $post_data['tags']);
        $this->save_tags($id_post, $post_data['tags']);
        
    }

    public function get_list_all_tags() {
        $query = $this->db->get('tags');
        return $query->result_array();
    }

}