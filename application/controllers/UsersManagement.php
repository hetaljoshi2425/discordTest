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
        $activeUserItemsCount = $this->users->usersActiveList($activewhere);
        $data['activeUserItemsCount'] = $activeUserItemsCount->num_rows();

        // 3.3 Count of all active products (just from products table).
        $activeitemwhere = [];
        $activeitemwhere['status'] = '0';
        $activeItemsCount = $this->users->activeItemList($activeitemwhere);
        $data['activeItemsCount'] = $activeItemsCount->num_rows();

        // 3.4. Count of active products which don't belong to any user.
        $activeItemsnotbelongstoUserCount = $this->users->activeItemNotbelongstoUserList();
        $data['activeItemsnotbelongstoUserCount'] = $activeItemsnotbelongstoUserCount->num_rows();
        
        // 3.5. Amount of all active attached products (if user1 has 3 prod1 and 2 prod2 which are active, user2 has 7 prod2 and 4 prod3, prod3 is inactive, then the amount of active attached products will be 3 + 2 + 7 = 12).
        $activeamountwhere = [];
        $activeamountwhere['products.status'] = '0';
        $select = "SUM(`usersproducts`.amount) as totalAmount";
        $activeUserItemsAmount = $this->users->activeItemsAttachedList($activeamountwhere, $select);
        $data['activeUserItemsAmount'] = $activeUserItemsAmount;

        // 3.6. Summarized price of all active attached products 
        $activesummarizedwhere = [];
        $activesummarizedwhere['products.status'] = '0';
        $activeUserItemssummarizedAmount = $this->users->summarizedItems($activesummarizedwhere);
        $data['activeUserItemssummarizedAmount'] = $activeUserItemssummarizedAmount;    

        // 3.7. Summarized prices of all active products per user. 
        $activesummarizedwhere = [];
        $activesummarizedwhere['products.status'] = '0';
        $activeUserItemssummarizedAmount = $this->users->summarizedItemsUserwise($activesummarizedwhere);
        $data['activeUserItemssummarizedAmount'] = $activeUserItemssummarizedAmount;

        $this->load->view('users/index', $data);
    }

    public function getExchangerates()
    {

        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.apilayer.com/exchangerates_data/latest?base=EUR',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'apikey: <access_api_key>'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        $data = [];
        $data['response'] = json_decode($response);
        
        $this->load->view('users/exchange_rates', $data);

    }
}
?>