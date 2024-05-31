<?php
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';
use GroceryCrud\Core\GroceryCrud;

class pedido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if (isset($this->session->get_userdata(0) ['LoggedIn']) != TRUE) {
            redirect('/Login/');
        }
        $this->load->library('email'); 
        $this->load->model('viewDetail');
        $this->load->model('model_proveedor');
        $this->load->model('model_clientes');
        $this->load->model('pedido_model');    
        $this->load->model('model_proveedorInterno');
        $this->load->model('model_proveedorExterno');
        $this->load->model('model_empleado');     
    } 

    public function index()
    {
        $this->cuenta();
    }

    public function cuenta()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4'); 
        $crud->setTable('pedido');
        $crud->setSubject('Pedido', 'Pedidos');
        $crud->setRelation('codigoPexterno','proveedorexterno', '{proveedor} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoPinterno','proveedorinterno', '{proveedor} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoCliente','clientes', '{cliente} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoEmpleado','empleados', '{nombre} - {apellidoPaterno} - {apellidoMaterno}');
        $crud->columns(['pedido',  'estatus', 'kgsA', 'kgsB','proceso']);
        $crud->callbackColumn('proceso', function ($value, $row) {          
         $icon = '';
         switch ($value) {
            case ' ':
            $icon = ' ';
            break;
            case 'EN PROCESO':
            $icon = '<i class="fa-solid fa-bars-progress" style="color: orange;"></i>';
            break;
            case 'FINALIZADO':
            $icon = '<i class="fa-solid fa-clipboard-check" style="color: green;"></i>';
            break;
            default:
            $icon = '';
            break;
        }
        return $icon . ' ' . $value;
    });
        $crud->callbackColumn('estatus', function ($value, $row) {          
         $icon = '';
         switch ($value) {
            case 'NO REVISADO':
            $icon = '<i class="fa-solid fa-circle-xmark" style="color: #B22222;"></i>';
            break;
            case 'APROBADO':
            $icon = '<i class="fa-solid fa-circle-check" style="color: blue;"></i>';
            break;
            case 'REVISADO':
            $icon = '<i class="fa-solid fa-rotate-right" style="color: orange;"></i>';
            break;
            case 'CANCELADO':
            $icon = '<i class="fa-solid fa-trash" style="color: #DC143C;"></i>';
            break;
            default:
            $icon = '';
            break;
        }
        return $icon . ' ' . $value;
    });
        $crud->setActionButton('Ver detalles P-E', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/pedido/viewDetails/' . $row->codigoPedido;
        }, false); 
        $crud->setActionButton('Ver detalles P-I', 'fa fa-list-check', function ($row) {
            return base_url().'index.php/pedido/viewsDetails/' . $row->codigoPedido;
        }, false);           
        $crud->setActionButton('Ver Gráfica', 'fa fa-chart-pie', function ($row) {
            return base_url().'index.php/pedido/vista/' . $row->codigoPedido;
        }, false);
        $crud->setActionButton('Actualizar estado', 'fa-solid fa-file-pen', function ($row) {
            return base_url().'index.php/pedido/autorizarestado/' . $row->codigoPedido."#/edit/".$row->codigoPedido;
        }, false);
        $crud->displayAs('fechaActivacion', 'Fecha de Activación');
        $crud->displayAs('estatus', 'Estatus pedido');
        $crud->displayAs('codigoPinterno', 'Proveedor Interno');
        $crud->displayAs('codigoPexterno', 'Proveedor Externo');
        $crud->displayAs('codigoCliente', 'Código de Cliente');
        $crud->displayAs('descripcionA', 'Descripción');
        $crud->displayAs('kgsA', 'Kilos (KG)');
        $crud->displayAs('descripcionB', 'Descripción');
        $crud->displayAs('kgsB', 'Kilos (KG)');
        $crud->displayAs('precioUnitario', 'Precio Unitario');
        $crud->displayAs('fechaEntrega', 'Fecha de Entrega');
        $crud->displayAs('codigoEmpleado', 'Autorizo');
        $crud->displayAs('proceso', 'Estado de Teñido');
        $crud->displayAs('kgsEntregados', 'Kilos Entregados (KG)');
        $crud->fields(['fechaActivacion',"pedido", "estatus", "codigoPinterno", "codigoPexterno", "codigoCliente", "descripcionA", "kgsA", "descripcionB", "kgsB", "precioUnitario", "fechaEntrega", "codigoEmpleado"]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }
    

    public function autorizarestado($id)
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setSkin('bootstrap-v4');
        $crud->setTable('pedido');
        $crud->where(["codigoPedido" => $id]);
        $crud->setSubject('Estado', 'Actualizar estado');
        $crud->columns(['pedido', 'proceso']);
        $crud->setRelation('codigoPexterno','proveedorexterno', '{proveedor} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoPinterno','proveedorinterno', '{proveedor} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoCliente','clientes', '{cliente} - {calle} - {noExterior} - {noInterior} - {colonia} - {cp} - {ciudad} - {estado} - {pais} - {telefono1} - {telefono2} - {correo}');
        $crud->setRelation('codigoEmpleado','empleados', '{nombre} - {apellidoPaterno} - {apellidoMaterno}');
        $crud->fields([]);
        $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();
        $crud->unsetAdd();
        $crud->unsetEditFields(["pedido", "estatus", "codigoPinterno", "codigoPexterno", "codigoCliente", "descripcionA", "kgsA", "descripcionB", "kgsB", "precioUnitario", "fechaEntrega", "codigoEmpleado"]);
        $crud->displayAs('fechaActivacion', 'Fecha de Activación');
        $crud->displayAs('estatus', 'Estatus pedido');
        $crud->displayAs('codigoPinterno', 'Código Interno');
        $crud->displayAs('codigoPexterno', 'Código Externo');
        $crud->displayAs('codigoCliente', 'Código de Cliente');
        $crud->displayAs('descripcionA', 'Descripción');
        $crud->displayAs('kgsA', 'Kilos (KG)');
        $crud->displayAs('descripcionB', 'Descripción');
        $crud->displayAs('kgsB', 'Kilos (KG)');
        $crud->displayAs('precioUnitario', 'Precio Unitario');
        $crud->displayAs('fechaEntrega', 'Fecha de Entrega');
        $crud->displayAs('codigoEmpleado', 'Autorizo');
        $crud->displayAs('proceso', 'Estado de Teñido');
        $crud->displayAs('kgsEntregados', 'Kilos Entregados (KG)');
        $crud->callbackEditForm( function ($data) {
            $data["fechaActivacion"] = date('Y-m-d');
            return $data;
        });
        $crud->callbackColumn('proceso', function ($value, $row) {          
         $icon = '';
         switch ($value) {
            case ' ':
            $icon = ' ';
            break;
            case 'EN PROCESO':
            $icon = '<i class="fa-solid fa-bars-progress" style="color: orange;"></i>';
            break;
            case 'FINALIZADO':
            $icon = '<i class="fa-solid fa-clipboard-check" style="color: green;"></i>';
            break;
            default:
            $icon = '';
            break;
        }
        return $icon . ' ' . $value;
    });
        $output = $crud->render();
        $this->_Dashboard_output($output);
    }

    public function vista($codigoPedido) {
        $data['pedido'] = $this->pedido_model->getPedido($codigoPedido);

        $this->load->view('grafica', $data);
    }

    public function viewDetails($codigoPedido){
        $data['pedido'] = $this->viewDetail->getPedido($codigoPedido); 
        $data['proveedorexterno'] = $this->model_proveedorExterno->getExternoByCodigo($data['pedido'][0]->codigoPexterno);
        $data['empleado'] = $this->model_empleado->getEmpleado($data['pedido'][0]->codigoEmpleado);
        $data['cliente'] = $this->model_clientes->getClienteByCodigo($data['pedido'][0]->codigoCliente);
        $getPedido = $this->viewDetail->getPedido_Partida($codigoPedido); 
        $arrayPedido = array();
        foreach ( $getPedido as $alma)
        {
           print_r($alma->codigoPedido);
           $infopartida = $this->viewDetail->getPartida($alma->codigoPartida);
           $info = array( 
               'partida' => $infopartida[0]->partida);
           array_push($arrayPedido, $info);
       }       
       $data['partida'] = $arrayPedido;
       $this->load->view('datospedidoe', $data);
    }

    public function viewsDetails($codigoPedido){
        $data['pedido'] = $this->viewDetail->getPedido($codigoPedido); 
        $data['proveedorinterno'] = $this->model_proveedorInterno->getInternoByCodigo($data['pedido'][0]->codigoPinterno);
        $data['empleado'] = $this->model_empleado->getEmpleado($data['pedido'][0]->codigoEmpleado);
        $data['cliente'] = $this->model_clientes->getClienteByCodigo($data['pedido'][0]->codigoCliente);
            $getPedido = $this->viewDetail->getPedido_Partida($codigoPedido); 
            $arrayPedido = array();
            foreach ( $getPedido as $alma)
            {
            print_r($alma->codigoPedido);
            $infopartida = $this->viewDetail->getPartida($alma->codigoPartida);
            $info = array( 
                'partida' => $infopartida[0]->partida);
            array_push($arrayPedido, $info);
            }       
            $data['partida'] = $arrayPedido;
        $this->load->view('datospedidoi', $data);
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
