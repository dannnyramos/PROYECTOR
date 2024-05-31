<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class tono extends CI_Controller
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
        $crud->setTable('tonos');
        $crud->setSubject('Tono', 'Tonos');
        $crud->columns(['color', 'codigo', 'tonalidad']);
        $crud->setActionButton('Ver detalles', 'fa fa-list-check', function ($row) {
        return base_url().'index.php/tono/viewDetails/' . $row->codigoTono;
        }, false);
        $uploadValidations = ['maxUploadSize' => '20M', 'minUploadSize' => '1K', 'allowedFileTypes' => ['gif','jpeg','jpg','png','tiff']];
        $crud->setFieldupload('foto', 'uploader/image', base_url('/uploader/image'));
        $crud->callbackColumn('Archivo', function ($value, $row) { 
            if( $value == ""){
              return '<img src="'.base_url().'/uploader/image/reemplazo.jpg'.'" height="20px">';  }
              return '<img src="'.base_url().'/uploader/image/'.$value.'" height="20px">'; 
          });
                
        $crud->callbackColumn('tonalidad', function ($value, $row) {
            $icon = '';
            switch ($value) {
                case 'BLANCO':
                    $icon = '<i class="fa-solid fa-droplet" style="color: white;"></i>';
                    break;
                case 'CLARO':
                    $icon = '<i class="fa-solid fa-droplet" style="color: lightgray;"></i>';
                    break;
                case 'MEDIO':
                    $icon = '<i class="fa-solid fa-droplet" style="color: gray;"></i>';
                    break;
                case 'OSCURO':
                    $icon = '<i class="fa-solid fa-droplet" style="color: black;"></i>';
                    break;
                case 'ESPECIAL':
                    $icon = '<i class="fa-solid fa-droplet" style="color: red;"></i>';
                    break;
                default:
                    $icon = '';
                    break;
            }
            return $icon . ' ' . $value;
        });
        $crud->displayAs('color', 'Color');
        $crud->displayAs('codigo', 'Código del color');
        $crud->displayAs('tonalidad', 'Tonalidad');
        $crud->displayAs('foto', 'Imagen');
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

     public function viewDetails($codigoTono){
        $data['tonos'] = $this->viewDetail->getTono($codigoTono); 
        $this->load->view('datostono', $data);
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