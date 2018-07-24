<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Controller {
    public function _remap($method, $args) {
        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {
            $this->index($method, $args);
        }
    }

    public function index($username) {
        
    }
}