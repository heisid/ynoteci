<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function check_user($username) {
        $this->db->select('username')
                 ->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_user($userdata) {

        if (empty($userdata['fullname'])) {
            $userdata['fullname'] = $userdata['username'];
        }

        $this->db->set('username', $userdata['username'])
                 ->set('password', $userdata['password'])
                 ->set('fullname', $userdata['fullname'])
                 ->set('user_role', 'user');
        $this->db->insert('users');

    }

    public function verify_user($username, $password) {
        $this->db->where('username', $username)
                 ->where('password', $password);
        $query = $this->db->get('users');
        if ($query->num_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_user_detail() {
        $this->load->library('user_agent');
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('user_detail_error', 'You are not logged in');
            // Throw back to the caller script
            redirect($this->agent->referer());
        } else {
            $this->db->where('username', $this->session->userdata('username'));
            $query = $this->db->get('users');
        }

        return $query->result_array();
    }

    public function get_user_role($username) {
        
        if (empty($username)) {
            return '';
        }

        $this->db->select('user_role')
                ->where('username', $username);
        $query = $this->db->get('users');
        $result = $query->row();
        return $result->user_role;
    }

}