<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MUsuarios');
    }

    function index(){
        $this->ingresar();
  }

    public function ingresar($data=null)
    {
        $data['output'] = null;
        $this->form_validation->set_rules('Usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login/login',$data);
        }
        else
        {
            $pass =  md5($this->input->post('Password'));
            $user =  $this->input->post('Usuario');
            $data = $this->MUsuarios->validUserCorreo($user, $pass);
            if(count($data)>0)
            {
                $newdata = array(
                    'IdUsuario'  => $data[0]->IdUsuario,
                    'Nombre' => $data[0]->Nombre,
                    'Correo' => $data[0]->CorreoElectronico,
                    'LoggedIn' => TRUE                    
                );
                $this->session->set_userdata($newdata);
                redirect('Pedido');
            }
            else
            {
                $data['output'] = null;
                $this->session->sess_destroy();
                $data['error'] ="Usuario y/o contraseña no válidos";
                $this->load->view('login/login',$data);
            }
        }
    }
    public function registro()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('correo', 'Correo Electrónico', 'required|valid_email|is_unique[usuarios.CorreoElectronico]');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmar_password', 'Confirmar Contraseña', 'required|matches[password]');
        $this->form_validation->set_rules('rol', 'Rol', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/registro');
        } else {
            $nuevoUsuario = [
                'Nombre' => $this->input->post('nombre'),
                'CorreoElectronico' => $this->input->post('correo'),
                'Password' => md5($this->input->post('password')),
                'Rol' => $this->input->post('rol'),
            ];

            if ($this->MUsuarios->insertarUsuario($nuevoUsuario)) {
                $this->session->set_flashdata('registro_exitoso', 'Tu cuenta ha sido creada exitosamente. Ahora puedes iniciar sesión.');
                redirect('login');
            } else {
                $this->session->set_flashdata('registro_fallido', 'Ocurrió un error al crear tu cuenta. Por favor, intenta nuevamente.');
                $this->load->view('login/registro');
            }
        }
    }

    public function salir()
    {
        $this->session->sess_destroy();
        redirect(base_url('index.php/Login'),'refresh');
    }
}
