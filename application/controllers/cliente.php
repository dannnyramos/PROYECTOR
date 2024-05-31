<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('viewDetail');
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
        $crud->setTable('clientes');
        $crud->setSubject('Cliente', 'Clientes');
        $crud->columns(['cliente',  'telefono1', 'telefono2', 'correo']);
        $uploadValidations = ['maxUploadSize' => '20M', 'minUploadSize' => '1K', 'allowedFileTypes' => ['gif','jpeg','jpg','png','tiff']];
        $crud->setFieldupload('foto', 'uploader/image', base_url('/uploader/image'));
        $crud->callbackColumn('Archivo', function ($value, $row) { 
            if( $value == ""){
              return '<img src="'.base_url().'/uploader/image/reemplazo.jpg'.'" height="20px">';  }
              return '<img src="'.base_url().'/uploader/image/'.$value.'" height="20px">'; 
          });
        $crud->setActionButton('Ver detalles', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/cliente/viewDetails/' . $row->codigoCliente;
        }, false);
        $crud->displayAs('codigoCliente', 'Código del Cliente');
        $crud->displayAs('foto', 'Foto');
        $crud->displayAs('cliente', 'Razón social');
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

    public function viewDetails($codigoCliente){
        $data['clientes'] = $this->viewDetail->getCliente($codigoCliente); 
        $this->load->view('datoscliente', $data);
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




