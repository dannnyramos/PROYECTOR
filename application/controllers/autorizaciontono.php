<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class autorizaciontono extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0)['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->model('viewDetail');
        $this->load->model('model_tonos');
        $this->load->model('autorizacion_model');
    }

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('laps');
        $crud->setSubject('Prueba', 'Autorización de tonos');
        $crud->columns(['tela', 'codigoTono', 'estatus']);
        $crud->setRelation('codigoTono', 'tonos', '{color}, {codigo}');
        $crud->callbackColumn('estatus', function ($value, $row) {
         $icon = '';
         switch ($value) {
            case 'NO AUTORIZADO':
            $icon = '<i class="fa-solid fa-circle-xmark" style="color: red;"></i>';
            break;
            case 'AUTORIZADO':
            $icon = '<i class="fa-solid fa-circle-check" style="color: blue;"></i>';
            break;
            case 'IGUALADO':
            $icon = '<i class="fa-regular fa-circle-check" style="color: orange;"></i>';
            break;
            default:
            $icon = '';
            break;
        }
        return $icon . ' ' . $value;
        });
        $uploadConfig = [
            'maxUploadSize' => '20M',
            'minUploadSize' => '1K',
            'allowedFileTypes' => ['gif', 'jpeg', 'jpg', 'png', 'tiff']
        ];
        $crud->displayAs('telacomposicion', 'Tela');
        $crud->displayAs('composicion', 'Composición');
        $crud->displayAs('codigoTono', 'Tono');
        $crud->displayAs('fechaRealizacion', 'Fecha Realización');
        $crud->displayAs('A', 'Imagen A');
        $crud->displayAs('B', 'Imagen B');
        $crud->displayAs('C', 'Imagen C');
        $crud->displayAs('D', 'Imagen D');
        $crud->displayAs('formulaA', 'No. Fórmula');
        $crud->displayAs('formulaB', 'No. Fórmula');
        $crud->displayAs('formulaC', 'No. Fórmula');
        $crud->displayAs('formulaD', 'No. Fórmula');
        $crud->displayAs('letraAutorizada', 'Letra Autorizada');
        $crud->displayAs('fechaAutorizacion', 'Fecha Autorización');
        $crud->displayAs('autorizo', 'Autorizó');
        $crud->displayAs('comentarios', 'Comentarios');
        $crud->displayAs('estatus', 'Estatus');
        foreach (['A', 'B', 'C', 'D'] as $field) {
            $crud->setFieldupload($field, 'uploader/image', base_url('/uploader/image'), $uploadConfig);
            $crud->callbackColumn($field, function ($value, $row) use ($field) {
                if ($value == "") {
                    return '<img src="' . base_url() . '/uploader/image/lap.png' . '" height="20px">';
                }
                return '<img src="' . base_url() . '/uploader/image/' . $value . '" height="20px">';
            });
        }
        $crud->setActionButton('Ver prueba', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/autorizaciontono/viewDetails/' . $row->codigoLapdik;
        }, false);
        $crud->setActionButton('Autorizar Prueba', 'fa-solid fa-file-pen', function ($row) {
            return base_url().'index.php/autorizaciontono/autorizarlap/' . $row->codigoLapdik."#/edit/".$row->codigoLapdik;
        }, false);
        $crud->fields(['tela', 'composicion', 'codigoTono', 'fechaRealizacion', 'A', 'formulaA','B', 'formulaB','C', 'formulaC', 'D', 'formulaD', ]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function viewDetails($codigoLapdik)
    {
        $data['laps'] = $this->viewDetail->getLap($codigoLapdik);
        $data['tono'] = $this->model_tonos->getTonoByCodigo($data['laps'][0]->codigoTono);
        $this->load->view('datosatono', $data);
    }

    public function autorizarlap($id)
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('laps');
        $crud->where(["codigoLapdik" => $id]);
        $crud->setSubject('Autorización de prueba', 'Autorización de tonos');
        $crud->columns(['tela', 'letraAutorizada','fechaAutorizacion','autorizo','comentarios', 'estatus']);
        $crud->displayAs('telacomposicion', 'Tela');
        $crud->displayAs('composicion', 'Composición');
        $crud->displayAs('codigoTono', 'Tono');
        $crud->displayAs('fechaRealizacion', 'Fecha Realización');
        $crud->displayAs('A', 'Imagen A');
        $crud->displayAs('B', 'Imagen B');
        $crud->displayAs('C', 'Imagen C');
        $crud->displayAs('D', 'Imagen D');
        $crud->displayAs('formulaA', 'No. Fórmula');
        $crud->displayAs('formulaB', 'No. Fórmula');
        $crud->displayAs('formulaC', 'No. Fórmula');
        $crud->displayAs('formulaD', 'No. Fórmula');
        $crud->displayAs('letraAutorizada', 'Letra Autorizada');
        $crud->displayAs('fechaAutorizacion', 'Fecha Autorización');
        $crud->displayAs('autorizo', 'Autorizó');
        $crud->displayAs('comentarios', 'Comentarios');
        $crud->displayAs('estatus', 'Estatus');
        $crud->setRelation('codigoTono', 'tonos', '{color}, {codigo}');
        $crud->fields([]);
        $crud->callbackColumn('estatus', function ($value, $row) {
         $icon = '';
         switch ($value) {
            case 'NO AUTORIZADO':
            $icon = '<i class="fa-solid fa-circle-xmark" style="color: red;"></i>';
            break;
            case 'AUTORIZADO':
            $icon = '<i class="fa-solid fa-circle-check" style="color: blue;"></i>';
            break;
            case 'IGUALADO':
            $icon = '<i class="fa-regular fa-circle-check" style="color: orange;"></i>';
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
        $crud->unsetAdd();
        $crud->unsetEditFields(["tela", "composicion", "codigoTono", "fechaRealizacion", "A", "formulaA", "B", "formulaB", "C", "formulaC", "D", "formulaD"]);
        $crud->callbackEditForm( function ($data) {
            $data["fechaAutorizacion"] = date('Y-m-d');
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
                'driver' => 'Pdo_Mysql',
                'host' => $db['default']['hostname'],
                'database' => $db['default']['database'],
                'username' => $db['default']['username'],
                'password' => $db['default']['password'],
                'charset' => 'utf8',
            ],
        ];
    }

    private function _getGroceryCrudEnterprise($bootstrap = true, $jquery = true)
    {
        $db = $this->_getDbData();
        $config = include APPPATH . 'config/gcrud-enterprise.php';
        $groceryCrud = new GroceryCrud($config, $db);
        return $groceryCrud;
    }
}
?>

