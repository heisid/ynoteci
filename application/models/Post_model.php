<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_recent_posts() {
        $this->db->limit(5)
                 ->order_by('date_post', 'DESC');
        $query = $this->db->get('posts');
        $result = $query->result_array();

        // Cropping post showcase in front page to 500 character,
        // Excluding html tags
        // TODO: Replace it with CodeIgniter built-in helper, if any
        foreach ($result as &$post) {
            $content_no_html = strip_tags($post['content']);
            $content_crop = substr($content_no_html, 0, 500);
            if (mb_strlen($content_no_html, 'utf8') > 500) {
                $content_crop .= '...';
            }
            $post['content'] = $content_crop;
        }
        // Anticipating if there's another variable having the same name
        // and somehow connected. Foreach above &$post passed by reference.
        unset($post);

        return $result;
    }

    public function get_single_post($id_post) {
        $this->db->where('id_post', $id_post);
        $query = $this->db->get('posts');
        return $query->row_array();
    }

    public function get_tags_by_id($id_post) {
        $this->db->select('tags.tag AS tag')
                 ->from('tags')
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

    private function delete_tags($id_post) {
        $this->db->where('id_post', $id_post)
                 ->delete('tags');
    }

    public function save_post($post_data) {
        $this->db->set('title_post', $post_data['title_post'])
                 ->set('author', $post_data['author'])
                 ->set('content', $post_data['content'])
                 ->set('date_post', 'NOW()', FALSE);
        $this->db->insert('posts');
        // last autoincrement integer
        $id_post = $this->db->insert_id();

        $this->save_tags($id_post, $post_data['tags']);
    }

    public function update_post($post_data) {
        $this->delete_tags($post_data['id_post']);
    
        $this->db->set('title_post', $post_data['title_post'])
                 ->set('content', $post_data['content'])
                 ->set('date_modified', 'NOW()', FALSE);
        $this->db->where('id_post', $post_data['id_post']);
        $this->db->update('posts');
        
        // another way set two table: using flush_cache(), rather than
        // making a new function (so fucking stupid)
        // $this->db->flush_cache();
        
        $this->save_tags($post_data['id_post'], $post_data['tags']);

    }

    public function get_list_all_tags() {
        $this->db->select('tag')
                 ->distinct();
        $query = $this->db->get('tags');
        return $query->result_array();
    }

    public function posts_by_tag($tag) {
        $this->db->select('tags.id_post AS id_post, posts.title_post AS title_post')
                 ->from('tags')
                 ->join('posts', 'posts.id_post = tags.id_post')
                 ->where('tags.tag', $tag);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_post($search_string) {
        $this->db->like('content', $search_string)
                 ->or_like('title_post', $search_string);
        $query = $this->db->get('posts');
        return $query->result_array();
    }

    public function edit_permission($id_post) {
        $current_user = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('logged_in');

        $this->db->select('author')
                 ->where('id_post', $id_post);
        $query = $this->db->get('posts');
        $author = $query->row()->author;
        if ($is_logged_in && $current_user == $author) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_permission($id_post) {
        $current_user = $this->session->userdata('username');
        $current_user_role = $this->User_model->get_user_role($current_user);
        $is_logged_in = $this->session->userdata('logged_in');

        $this->db->select('author')
                 ->where('id_post', $id_post);
        $query = $this->db->get('posts');
        $author = $query->row()->author;
        if ($is_logged_in && ($current_user == $author) || ($current_user_role == 'admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function posts_by_author($author) {
        $this->db->select('id_post, title_post')
                 ->where('author', $author);
        $query = $this->db->get('posts');
        return $query->result_array();
    }

}
