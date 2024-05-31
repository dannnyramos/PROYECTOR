<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

 class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

 public function index()
    {
        $this->load->view('welcome');
          $this->load->helper('url');

    }

     private function _getDbData()
    {
        $db = [];
        include APPPATH . 'config/database.php';
        return [
            'adapter' => [
                'driver'   => 'Pdo_Mysql',
                'host'     => $db['default']['hostname'],
                'database' => $db['default']['database'],
                'username' => $db['default']['username'],
                'password' => $db['default']['password'],
                'charset'  => 'utf8',
            ],
        ];
    }
    private function _getGroceryCrudEnterprise($bootstrap = true, $jquery = true)
    {
        $db          = $this->_getDbData();
        $config      = include APPPATH . 'config/gcrud-enterprise.php';
        $groceryCrud = new GroceryCrud($config, $db);
        return $groceryCrud;
    }
}
 
