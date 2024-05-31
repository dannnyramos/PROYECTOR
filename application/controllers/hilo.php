<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class hilo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->library('email'); 
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('hilos');
        $crud->setSubject('Hilo', 'Hilos');
        $crud->displayAs('codigoHilo', 'Código del Hilo');
        $crud->displayAs('proveedor', 'Proveedor');
        $crud->displayAs('hilo', 'Medida del Hilo');
        $crud->callbackColumn('proveedor', function ($value, $row) {
         $icon = '';
         switch ($value) {
            case 'CODIPSA':
            $icon = '<i class="fa-solid fa-building-user" style="color: purple;"></i>';
            break;
            case 'FILAFIL':
            $icon = '<i class="fa-solid fa-building-user" style="color: Pink;"></i>';
            break;
            case 'MARIE LOU':
            $icon = '<i class="fa-solid fa-building-user" style="color: orange;"></i>';
            break;
            case 'TAURO TEXTIL':
            $icon = '<i class="fa-solid fa-building-user" style="color: Green;"></i>';
            break;
            default:
            $icon = '';
            break;
        }
        return $icon . ' ' . $value;
        });
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function _Dashboard_output($output = null)
    {
        if (isset($output->isJSONResponse) && $output->isJSONResponse) {
            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }
        $this->load->view('head', $output);
        $this->load->view('crud');
        $this->load->view('footer');
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