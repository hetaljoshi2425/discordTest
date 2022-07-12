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


    function activeItemsAttachedList ($where, $select = NULL) {
        if($select!=NULL) {
            $this->db->select($select);
        }
        $this->db->join('usersproducts','usersproducts.product_id = products.id', 'INNER');
        return $this->db->get_where('products', $where);
    }

    function summarizedItems ($where, $select = NULL) {
        return $this->db->query("SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized' FROM `products` INNER JOIN `usersproducts` ON `usersproducts`.`product_id` = `products`.`id` WHERE `products`.`status` = '0'");
    }

    function summarizedItemsUserwise ($where, $select = NULL) {
        return $this->db->query("SELECT SUM(`usersproducts`.`amount` * `usersproducts`.`quantity`) as 'TotalSummarized', `users`.`name`, `users`.`email`, `users`.`id` FROM `users` INNER JOIN `usersproducts` ON `usersproducts`.`user_id` = `users`.`id` INNER JOIN `products` ON `products`.`id` = `usersproducts`.`product_id` WHERE `users`.`status` = '0' AND `users`.`email_verified_at` IS NOT NULL AND `products`.`status` = '0' GROUP by `usersproducts`.`user_id`");
    }

    function activeItemList ($where) {
        return $this->db->get_where('products', $where);
    }

    function activeItemNotbelongstoUserList () {
        return $this->db->query("SELECT * FROM `products` WHERE `status` = '0' AND `id` NOT IN (SELECT product_id FROM usersproducts)");
    }

    
}
?>