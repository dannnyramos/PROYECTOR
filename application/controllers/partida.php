<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class partida extends CI_Controller
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
        $this->load->model('model_hilos');
        $this->load->model('model_pedido');
        $this->load->model('model_tonos');
        $this->load->model('model_medida');   
        $this->load->model('partidam');
    }    

    public function index()
    {
        $this->cuenta();            
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('partidas');
        $crud->setSubject('Partida', 'Partidas');
        $crud->setRelation('codigoPedido','pedido', '{pedido} - {estatus}');
        $crud->setRelation('codigoTono','tonos', '{color} - {codigo} - {tonalidad}');
        $crud->setRelation('codigoMedida','medidas', '{composicion} - {LMJersey} - {pesoAcabadoJersey} - {LMRib} - {pesoAcabadoRib}');
        $crud->columns(['partida',  'codigoPedido', 'codigoTono','totalKgs', 'estatus']);
        $crud->setRelationNtoN('lotes', 'partida_Lote', 'lotes', 'codigoPartida', 'codigoLote', 'lote');
        $crud->setRelation('codigoHilo','hilos', '{proveedor} - {hilo} ');
        $crud->setRelationNtoN('rollos', 'partida_Rollo', 'rollos', 'codigoPartida', 'codigoRollo', '{codigo} - {KgInicial}- {rolloCreado}'); 
        $crud->setActionButton('Ver Partida', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/partida/viewDetails/' . $row->codigoPartida;
        }, false);
        $crud->setActionButton('Envio de partida', 'fa-solid fa-file-import', function ($row) {    
            return base_url().'index.php/partida/detalle/' . $row->codigoPartida;
        }, false);
        $crud->setActionButton('Datos de calidad', 'fa-solid fa-square-check', function ($row) {
            return base_url().'index.php/partida/calidad/' . $row->codigoPartida."#/edit/".$row->codigoPartida;   
        }, false);
        $crud->setActionButton('Pruebas de Calidad', 'fa-solid fa-calculator', function ($row) {   
            return base_url().'index.php/partida/viewCalidad/' . $row->codigoPartida;
        }, false);

        $crud->callbackColumn('estatus', function ($value, $row) {
        $icon = '';
        switch ($value) {
            case '':
            $icon = ' ';
            break;
            case 'TELA RECIBIDA':
            $icon = '<i class="fa-solid fa-registered" style="color: #03C03C;"></i>';
            break;
            case 'PARTIDA ENTREGADA':
            $icon = '<i class="fa-solid fa-paper-plane" style="color: #006400;"></i>';
            break;
            default:
            $icon = '';
            break;
            }
            return $icon . ' ' . $value;
        });
        $crud->displayAs('partida', 'Partida');
        $crud->displayAs('codigoPedido', 'Pedido');
        $crud->displayAs('fecha', 'Fecha');
        $crud->displayAs('codigoHilo', 'Hilo');
        $crud->displayAs('codigoTono', 'Tono');
        $crud->displayAs('totalRollos', 'Total de Rollos');
        $crud->displayAs('telaRib', 'Tela Rib');
        $crud->displayAs('diametro', 'Diámetro');
        $crud->displayAs('anchoTotal', 'Ancho Total');
        $crud->displayAs('anchoUtil', 'Ancho Útil');
        $crud->displayAs('notaJersey', 'Nota Jersey');
        $crud->displayAs('notaRib', 'Nota Rib');
        $crud->displayAs('totalRollosJersey', 'Total Rollos Jersey');
        $crud->displayAs('totalRollosRib', 'Total Rollos Rib');
        $crud->displayAs('kgsJersey', 'Kilos Jersey');
        $crud->displayAs('kgsRib', 'Kilos Rib');
        $crud->displayAs('kgsPique', 'Kilos Piqué');
        $crud->displayAs('totalKgs', 'Total Kilos');
        $crud->displayAs('estatus', 'Estatus');
        $crud->displayAs('codigoMedida', 'Medidas');
        $crud->displayAs('entrego', 'Entregó');
        $crud->displayAs('recibio', 'Recibió');
        $crud->displayAs('fechaMuestra', 'Fecha de Muestra');
        $crud->displayAs('tipoTejido', 'Tipo de Tejido');
        $crud->displayAs('pesoReal', 'Peso Real');
        $crud->displayAs('noRollo', 'Número de Rollo');
        $crud->displayAs('ancho', 'Ancho');
        $crud->displayAs('largo', 'Largo');
        $crud->displayAs('torsion', 'Torsión');
        $crud->displayAs('rendimiento', 'Rendimiento');
        $crud->displayAs('metrosJersey', 'Metros Jersey');
        $crud->displayAs('ydJersey', 'Yardas Jersey');
        $crud->displayAs('metrosRib', 'Metros Rib');
        $crud->displayAs('ydRib', 'Yardas Rib');
        $crud->Fields(['partida', 'codigoPedido', 'fecha', 'codigoHilo', 'codigoTono', 'totalRollos', 'telaRib', 'diametro', 'anchoTotal', 'anchoUtil', 'notaJersey', 'notaRib', 'totalKgs', 'estatus', 'codigoMedida', 'entrego', 'recibio', 'rollos', 'lotes']);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function calidad($id)
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('partidas');
        $crud->where(["codigoPartida" => $id]);
        $crud->setSubject('Pruebas de Calidad', 'Pruebas de Calidad');
        $crud->columns(['partida', 'totalKgs', 'estatus']);

        $crud->displayAs('anchoTotal', 'Ancho Total');
        $crud->displayAs('anchoUtil', 'Ancho Útil');
        $crud->displayAs('totalRollosJersey', 'Total Rollos Jersey');
        $crud->displayAs('totalRollosRib', 'Total Rollos Rib');
        $crud->displayAs('kgsJersey', 'Kilos Jersey');
        $crud->displayAs('kgsRib', 'Kilos Rib');
        $crud->displayAs('kgsPique', 'Kilos Piqué');
        $crud->displayAs('totalKgs', 'Total Kilos');
        $crud->displayAs('totalKgsF', 'Total Kilos');
        $crud->displayAs('fechaMuestra', 'Fecha de Muestra');
        $crud->displayAs('tipoTejido', 'Tipo de Tejido');
        $crud->displayAs('pesoReal', 'Peso Real');
        $crud->displayAs('noRollo', 'Número de Rollo');
        $crud->displayAs('ancho', 'Ancho');
        $crud->displayAs('largo', 'Largo');
        $crud->displayAs('torsion', 'Torsión');
        $crud->displayAs('rendimiento', 'Rendimiento');
        $crud->displayAs('metrosJersey', 'Metros Jersey');
        $crud->displayAs('ydJersey', 'Yardas Jersey');
        $crud->displayAs('metrosRib', 'Metros Rib');
        $crud->displayAs('ydRib', 'Yardas Rib');
        $crud->fields([]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $crud->unsetAdd();
        $crud->unsetEditFields(['partida', 'codigoPedido', 'fecha', 'codigoHilo', 'codigoTono', 'totalRollos', 'telaRib', 'diametro', 'anchoTotal', 'anchoUtil', 'notaJersey', 'notaRib', 'totalKgs', 'estatus', 'codigoMedida', 'entrego', 'recibio', 'rollos', 'lotes']);
        $crud->callbackEditForm( function ($data) {
            $data["fechaMuestra"] = date('Y-m-d');
            return $data;
        });
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function viewDetails($codigoPartida){
        $data['partida'] = $this->viewDetail->getPartida($codigoPartida); 
        $data['pedidop'] = $this->model_pedido->getPedidoByCodigo($data['partida'][0]->codigoPedido);
        $data['medida'] = $this->model_medida->getMedidasByCodigo($data['partida'][0]->codigoMedida);
        $data['hilo'] = $this->model_hilos->getHiloByCodigo($data['partida'][0]->codigoHilo);
        $data['tono'] = $this->model_tonos->getTonoByCodigo($data['partida'][0]->codigoTono);

        $getPartidaR = $this->viewDetail->getPartida_Rollo($codigoPartida); 
        $arrayPartidaR = array();
        foreach ( $getPartidaR as $alma)
        {
            print_r($alma->codigoRollo);
            $inforollo = $this->viewDetail->getRollo($alma->codigoRollo);
            $info = array( 
                'rollo' => $inforollo[0]->codigo);
            array_push($arrayPartidaR, $info);
             $info = array( 
                'rollo' => $inforollo[0]->KgInicial);
            array_push($arrayPartidaR, $info);
        }       
        $data['rollo'] = $arrayPartidaR; 
          

        $getLote = $this->viewDetail->getPartida_Lote($codigoPartida); 
        $arrayLote = array();
        foreach ( $getLote as $alma)
        {
            print_r($alma->codigoLote);
            $infolote = $this->viewDetail->getLote($alma->codigoLote);
            $info = array('lote' => $infolote[0]->lote);
            array_push($arrayLote, $info);
        }        
        $data['lote'] = $arrayLote;

        $informacionPartida = $this->partidam->getInformacionPartida($codigoPartida);
        if (!$informacionPartida) {
        show_404();
        return;
    }
        $data['informacionPartida'] = $informacionPartida;
            $this->load->view('datospartida', $data);
    }
     public function viewCalidad($codigoPartida){
        $data['partida'] = $this->viewDetail->getPartida($codigoPartida); 
        $data['pedidop'] = $this->model_pedido->getPedidoByCodigo($data['partida'][0]->codigoPedido);
        $data['medida'] = $this->model_medida->getMedidasByCodigo($data['partida'][0]->codigoMedida);
        $data['hilo'] = $this->model_hilos->getHiloByCodigo($data['partida'][0]->codigoHilo);
        $data['tono'] = $this->model_tonos->getTonoByCodigo($data['partida'][0]->codigoTono);
        $this->load->view('datoscalidad', $data);
    }

    public function detalle($codigoPartida){
        $data['partida'] = $this->viewDetail->getPartida($codigoPartida); 
        $data['pedidop'] = $this->model_pedido->getPedidoByCodigo($data['partida'][0]->codigoPedido);
        $data['medida'] = $this->model_medida->getMedidasByCodigo($data['partida'][0]->codigoMedida);
        $data['hilo'] = $this->model_hilos->getHiloByCodigo($data['partida'][0]->codigoHilo);
        $data['tono'] = $this->model_tonos->getTonoByCodigo($data['partida'][0]->codigoTono);

        $getPartidaR = $this->viewDetail->getPartida_Rollo($codigoPartida); 
        $arrayPartidaR = array();
        foreach ( $getPartidaR as $alma)
        {
            print_r($alma->codigoRollo);
            $inforollo = $this->viewDetail->getRollo($alma->codigoRollo);
            $info = array( 
                'rollo' => $inforollo[0]->codigo);
            array_push($arrayPartidaR, $info);
             $info = array( 
                'rollo' => $inforollo[0]->KgFinal);
            array_push($arrayPartidaR, $info);
        }       
        $data['rollo'] = $arrayPartidaR; 
          
        $getLote = $this->viewDetail->getPartida_Lote($codigoPartida); 
        $arrayLote = array();
        foreach ( $getLote as $alma)
        {
            print_r($alma->codigoLote);
            $infolote = $this->viewDetail->getLote($alma->codigoLote);
            $info = array('lote' => $infolote[0]->lote);
            array_push($arrayLote, $info);
        }        
        $data['lote'] = $arrayLote;

        $informacionPartida = $this->partidam->getInformacionPartida($codigoPartida);
    if (!$informacionPartida) {
        show_404();
        return;
    }
    $data['informacionPartida'] = $informacionPartida;
        $this->load->view('datosenvio', $data);
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

//$crud->fields(['partida', 'codigoPedido', 'fecha', 'codigoHilo', 'codigoTono', 'totalRollos', 'telaRib', 'diametro', 'anchoTotal', 'anchoUtil', 'notaJersey', 'notaRib', 'totalRollosJersey', 'totalRollosRib','kgsJersey', 'kgsRib', 'kgsPique', 'totalKgs', 'estatus', 'codigoMedida', 'entrego', 'recibio','fechaMuestra', 'tipoTejido', 'pesoReal', 'noRollo', 'ancho', 'largo', 'torsion', 'rendimiento','metrosJersey', 'ydJersey', 'metrosRib', 'ydRib']);