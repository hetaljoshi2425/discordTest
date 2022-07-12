<?php
class UsersManagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users');
    }

    public function index()
    {
        $where = [];
        $where['status'] = '0';
        $where['email_verified_at!='] = NULL;
        $result = $this->users->usersList($where);
        // 3.1. Count of all active and verified users.
        $data = [];
        $data['data'] = $result;

        // 3.2. Count of active and verified users who have attached active products.
        $activewhere = [];
        $activewhere['users.status'] = '0';
        $activewhere['users.email_verified_at!='] = NULL;
        $activewhere['products.status'] = '0';
        $activeItemsCount = $this->users->usersActiveList($activewhere);
        $data['activeItemsCount'] = $activeItemsCount->num_rows();
        
        $this->load->view('users/index', $data);
    }
}
?>