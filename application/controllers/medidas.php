<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class medidas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }        
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('medidas');
        $crud->setSubject('Medida de tela', 'Información de medidas de telas');
        $crud->callbackColumn('composicion', function ($value, $row) {
            $icon = '';
            switch ($value) {
                case '100% ALGODÓN':
                    $icon = '<i class="fa-solid fa-stop" style="color: blue;"></i>';
                    break;
                case '99% ALGODÓN/ 1% POLIÉSTER':
                    $icon = '<i class="fa-solid fa-stop" style="color: lightgreen;"></i>';
                    break;
                case '95% ALGODÓN/ 5% SPANDEX':
                    $icon = '<i class="fa-solid fa-stop" style="color: orange;"></i>';
                    break;
                case '65/35':
                    $icon = '<i class="fa-solid fa-stop" style="color: purple;"></i>';
                    break;
                case '60% ALGODÓN/40% POLIÉSTER':
                    $icon = '<i class="fa-solid fa-stop" style="color: brown;"></i>';
                    break;
                case '50% ALGODÓN/50% POLIÉSTER':
                    $icon = '<i class="fa-solid fa-stop" style="color: #FF69B4;"></i>';
                    break;
                case '48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX':
                    $icon = '<i class="fa-solid fa-stop" style="color: #FFD700;"></i>';
                    break;
                default:
                    $icon = '';
                    break;
            }
            return $icon . ' ' . $value;
        });
        $crud->displayAs('codigoMedida', 'Código de Medida');
        $crud->displayAs('composicionLMJersey', 'Composición LM Jersey');
        $crud->displayAs('pesoAcabadoJersey', 'Peso Acabado Jersey');
        $crud->displayAs('LMRib', 'LM Rib');
        $crud->displayAs('pesoAcabadoRib', 'Peso Acabado RIB');
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