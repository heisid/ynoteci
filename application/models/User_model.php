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

}