<?php
class Users extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function usersList ($where) {
        return $this->db->get_where('users', $where);
    }
}
?>