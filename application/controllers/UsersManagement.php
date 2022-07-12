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

        $data = [];
        $data['data'] = $result;
        // echo "<pre>";
        // print_r($result->result());
        // exit;
        $this->load->view('users/index', $data);
    }
}
?>