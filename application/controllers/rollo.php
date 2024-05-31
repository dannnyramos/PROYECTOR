<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class rollo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('viewDetail');
        $this->load->model('model_telas');
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('rollos');
        $crud->setSubject('Rollo', 'Rollos');
        $crud->setRelation('codigoTela','telas', '{tipo} - {composicion} - {pesoGrs}');
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $crud->displayAs('codigo', 'Código');
        $crud->displayAs('KgInicial', 'Peso Inicial (Kg)');   
        $crud->displayAs('comentarios', 'Comentarios');
        $crud->displayAs('codigoTela', 'Tela');
        $crud->displayAs('rolloCreado', 'Fecha de rollo creado');
        $crud->displayAs('KgFinal', 'Peso Final (Kg)');
        $crud->displayAs('metros', 'Metros');
        $crud->displayAs('yardas', 'Yardas');
        $crud->displayAs('fecha', 'Fecha');
        $crud->fields(['codigo', 'KgInicial', 'codigoTela', 'rolloCreado']);
        $crud->setActionButton('Datos de teñido', 'fa-solid fa-file-pen', function ($row) {
            return base_url().'index.php/rollo/rollotenido/' . $row->codigoRollo."#/edit/".$row->codigoRollo;
        }, false);
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function rollotenido($id)
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('rollos');
        $crud->where(["codigoRollo" => $id]);
        $crud->setSubject('rollo teñido', 'Rollo teñido');
        $crud->columns(['codigo', 'KgFinal','metros', 'yardas' ]);
        $crud->displayAs('codigo', 'Código');
        $crud->displayAs('KgInicial', 'Peso Inicial (Kg)');   
        $crud->displayAs('comentarios', 'Comentarios');
        $crud->displayAs('codigoTela', 'Tela');
        $crud->displayAs('rolloCreado', 'Fecha de rollo creado');
        $crud->displayAs('KgFinal', 'Peso Final (Kg)');
        $crud->displayAs('metros', 'Metros');
        $crud->displayAs('yardas', 'Yardas');
        $crud->displayAs('fecha', 'Fecha');
        $crud->fields([]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $crud->unsetAdd();
        $crud->unsetEditFields(['codigo', 'KgInicial', 'codigoTela', 'rolloCreado']);
        $crud->callbackEditForm( function ($data) {
            $data["fecha"] = date('Y-m-d');
            return $data;
        });
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function viewDetails($codigoRollo){
        $data['rollos'] = $this->viewDetail->getRollo($codigoRollo); 
        $data['tela'] = $this->viewDetail->getTelaByCodigo($data['rollos'][0]->codigoTela);
        $this->load->view('datosrollo', $data);
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