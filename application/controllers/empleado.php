<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class empleado extends CI_Controller
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
        $crud->setTable('empleados');
        $crud->setSubject('Empleado', 'Expedientes de empleados');
        $crud->columns(['nombre',  'planta', 'puesto', 'telefono']);
        $uploadValidations = ['maxUploadSize' => '20M', 'minUploadSize' => '1K', 'allowedFileTypes' => ['gif','jpeg','jpg','png','tiff']];
        $crud->setFieldupload('foto', 'uploader/image', base_url('/uploader/image'));
        $crud->callbackColumn('Archivo', function ($value, $row) { 
            if( $value == ""){
              return '<img src="'.base_url().'/uploader/image/reemplazo.jpg'.'" height="20px">';  }
              return '<img src="'.base_url().'/uploader/image/'.$value.'" height="20px">'; 
          });
        $crud->displayAs('foto', 'Foto del Empleado');
        $crud->displayAs('nombre', 'Nombre');
        $crud->displayAs('apellidoPaterno', 'Apellido Paterno');
        $crud->displayAs('apellidoMaterno', 'Apellido Materno');
        $crud->displayAs('planta', 'Planta de Trabajo');
        $crud->displayAs('puesto', 'Puesto de Trabajo');
        $crud->displayAs('telefono', 'Número de Teléfono');
        $crud->displayAs('email', 'Correo Electrónico');
        $crud->setActionButton('Ver detalles', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/empleado/viewDetails/' . $row->codigoEmpleado;
        }, false);

        $crud->callbackColumn('planta', function ($value, $row) {
            $icon = '';
            switch ($value) {
                case 'Matriz Comercializadora Keter':
                $icon = '<i class="fa-solid fa-city" style="color: #006400;"></i>';
                break;
                case 'Teñido - Comercializadora Keter':
                $icon = '<i class="fa-solid fa-building-shield" style="color: #008000;"></i>';
                break;
                case 'Tejido - Comercializadora Keter':
                $icon = '<i class="fa-solid fa-warehouse" style="color: #00FF00;"></i>';
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

    public function viewDetails($codigoEmpleado){
        $data['empleado'] = $this->viewDetail->getEmpleado($codigoEmpleado); 
        $this->load->view('datosempleado', $data);
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




