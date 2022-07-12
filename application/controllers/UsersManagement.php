<?php
class UsersManagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users');
        $this->init();
    }

    public function index()
    {
        $where = [];
        $where['status'] = '0';
        $where['email_verified_at!='] = NULL;
        $result = $this->users->usersList($where);
        echo "<pre>";
        print_r($result);
        exit;
        $this->load->view('users/index');
    }
}
?>