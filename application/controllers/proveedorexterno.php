<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class proveedorexterno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('viewDetail');
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('proveedorexterno');
        $crud->setSubject('Proveedor externo', 'Proveedores externos');
        $crud->columns(['proveedor', 'telefono1','telefono2','correo' ]);
        $crud->setActionButton('Ver detalles', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/proveedorexterno/viewDetails/' . $row->codigoPexterno;
        }, false);
        $crud->displayAs('proveedor', 'Razón social');
        $crud->displayAs('calle', 'Calle');
        $crud->displayAs('noExterior', 'Número Exterior');
        $crud->displayAs('noInterior', 'Número Interior');
        $crud->displayAs('colonia', 'Colonia');
        $crud->displayAs('cp', 'Código Postal');
        $crud->displayAs('ciudad', 'Ciudad');
        $crud->displayAs('estado', 'Estado');
        $crud->displayAs('pais', 'País');
        $crud->displayAs('telefono1', 'Teléfono 1');
        $crud->displayAs('telefono2', 'Teléfono 2');
        $crud->displayAs('correo', 'Correo Electrónico');
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }
        public function viewDetails($codigoPexterno){
        $data['proveedorexterno'] = $this->viewDetail->getPexterno($codigoPexterno); 
        $this->load->view('datospexterno', $data);
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



