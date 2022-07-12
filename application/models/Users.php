<?php
class Users extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function usersList ($where) {
        return $this->db->get_where('users', $where);
    }

    function usersActiveList ($where) {
        $this->db->join('usersproducts','usersproducts.user_id = users.id', 'INNER');
        $this->db->join('products','products.id = usersproducts.product_id', 'INNER');
        $this->db->group_by('usersproducts.user_id');
        return $this->db->get_where('users', $where);
    }
}
?>