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

}