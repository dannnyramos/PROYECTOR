<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class permisos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('usuariomodel');
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta() {
        $idUsuario = $this->session->userdata('idUsuario');
        $rol = $this->usuariomodel->obtener_rol_usuario($idUsuario);
        $crud = $this->configurar_crud_segun_rol($rol);
        $output = $crud->render();
        $this->_dashboard_output($output); 
    }

    private function configurar_crud_segun_rol($rol) {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('usuarios');
        $crud->setSubject('Permisos', 'Lista de permisos');
        $crud->columns(['Nombre', 'CorreoElectronico', 'Creado', 'Rol']);
        
        switch ($rol) {
            case 'Administrador':
                $crud->setActions(['edit', 'delete', 'view', 'add']);
                break;
            case 'Gerente':
                $crud->unsetAdd();
                $crud->unsetDelete();
                break;
            case 'Empleado':
                $crud->unsetAdd();
                $crud->unsetClone();
                $crud->unsetEdit();
                $crud->unsetRead();
                $crud->unsetDelete();
                break;
            default:
                $crud->unsetOperations();
                break;
        }
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        
        return $crud;
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
