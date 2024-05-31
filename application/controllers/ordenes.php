<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class ordenes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('viewDetail');
        $this->load->model('model_partidas');
        $this->load->model('info_orden');
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
        $crud->setTable('maquinas');
        $crud->setSubject('Orden de teñido', 'Ordenes de teñido de telas');
        $crud->setRelation('codigoPartida','partidas', 'partida');
        $visibleFields = ['maquina', 'orden', 'codigoPartida', 'shifon', 'rib', 'tela'];
        $crud->setActionButton('Ver orden de teñido', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/ordenes/viewDetails/' . $row->codigoMaquina;});
        $crud->setActionButton('Actualizar etapa de teñido', 'fa-solid fa-file-pen', function ($row) {
            return base_url().'index.php/ordenes/autorizarorden/' . $row->codigoMaquina."#/edit/".$row->codigoMaquina;
        }, false);
        $crud->fields(["maquina", "orden", "codigoPartida", "tela"]);
        $crud->displayAs('maquina', 'Máquina');
        $crud->displayAs('orden', 'Orden');
        $crud->displayAs('codigoPartida', 'Partida');
        $crud->displayAs('tela', 'Tela');
        $crud->displayAs('fase', 'Etapa');
        $crud->displayAs('fecha', 'Fecha');
        $crud->callbackColumn('maquina', function ($value, $row) {
            $icon = '';
            switch ($value) {
                case 'JET 1':
                $icon = '<i class="fa-solid fa-gear" style="color: #FF0000;"></i>';
                break;
                case 'JET 2':
                $icon = '<i class="fa-solid fa-gear" style="color: #00FF00;"></i>';
                break;
                case 'JET 3':
                $icon = '<i class="fa-solid fa-gear" style="color: #0000FF;"></i>';
                break;
                default:
                $icon = '';
                break;
            }
            return $icon . ' ' . $value;
        });
        $crud->callbackColumn('fase', function ($value, $row) {
            $icon = '';
            switch ($value) {
                case ' ':
                $icon = ' ';
                break;
                case 'TELA PLEGADA':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #00FF00;"></i>'; 
                break;
                case 'FÓRMULA':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #FF0000;"></i>';
                break;
                case 'TEÑIDO':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #0000FF;"></i>';
                break;
                case 'PRIMERA REVISIÓN':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #FFA500;"></i>';
                break;
                case 'SEGUNDA REVISIÓN':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #800080;"></i>';
                break;
                case 'TEÑIDO AUTORIZADO':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #FFFF00;"></i>';
                break;
                case 'ABRIDORA':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #008080;"></i>';
                break;
                case 'RAMA':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #FFC0CB;"></i>';
                break;
                case 'ENROLLADO Y ETIQUETADO':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #800000;"></i>';
                break;
                case 'TELA ENTREGADA':
                $icon = '<i class="fa-solid fa-circle-check" style="color: #00FF00;"></i>';
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
    public function viewDetails($codigoMaquina){
        $data['maquinas'] = $this->viewDetail->getMaquina($codigoMaquina); 
        $data['partida'] = $this->model_partidas->getPartidaByCodigo($data['maquinas'][0]->codigoPartida);
        $informacionOrden = $this->info_orden->getInformacionMaquinas($codigoMaquina);
        if (!$informacionOrden) {
            show_404();
            return;
        }
        $data['informacionOrden'] = $informacionOrden;
        $this->load->view('datosmaquina', $data);
    }

    public function autorizarorden($id)
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('maquinas');
        $crud->where(["codigoMaquina" => $id]);
        $crud->setSubject('Etapa de teñido', 'Segumiento de teñido');
        $crud->columns(['maquina', 'codigoPartida', 'fase']);
        $crud->setRelation('codigoPartida','partidas', 'partida');
        $crud->displayAs('maquina', 'Nombre de Máquina');
        $crud->displayAs('orden', 'Orden');
        $crud->displayAs('codigoPartida', 'Código de Partida');
        $crud->displayAs('tela', 'Tela');
        $crud->displayAs('fase', 'Etapa');
        $crud->displayAs('fecha', 'Fecha');
        $crud->fields([]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $crud->unsetAdd();
        $crud->unsetEditFields(["maquina", "orden", "codigoPartida", "tela"]);
        $crud->callbackEditForm( function ($data) {
            $data["fecha"] = date('Y-m-d');
            return $data;
        });
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