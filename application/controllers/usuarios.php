<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function login()
    {
        if ($this->input->post('login')){
            $nick = $this->input->post('nick');
            $password = $this->input->post('password');
            $id_comunidad = $this->Usuario->comunidad_id_segun_nick($nick);
            /* comprueba si tiene metido algo en comunidad_id, asi sabe si esta en una comunidad o no(esto es para que salga el menu de elegir comunidad o no)*/
            if ($this->loguear($nick, $password) == TRUE && $id_comunidad == "")
            {
                redirect('comunidades/elegir_comunidad', 'refresh');   

            }
            else if ($this->loguear($nick, $password) == TRUE && $id_comunidad != "")
            {
                $this->session->set_userdata('id_comunidad', $id_comunidad);
                redirect('comunidades/index', 'refresh'); 
            }
            else{
                $data['error'] = true;
                $this->load->view('usuarios/login', $data);
            }
        }
        else
        {
            $this->load->view('usuarios/login');
        }
    }


    private function loguear($nick, $password){

        $id_usuario = $this->Usuario->id_segun_nick_password($nick, $password);

        if ($id_usuario !== FALSE){
            $this->session->set_userdata('nick', $nick);
            $this->session->set_userdata('id_usuario',$id_usuario);
            $this->session->set_userdata('form_nserie','');
            return TRUE; 
        }
        else{
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/usuarios/login');
    }







    public function singup()
    {
        if ($this->input->post('singup')){



            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $nick = $this->input->post('nick');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $confirm_password = $this->input->post('confirm_password');
           


            $reglas = array(
                array(
                      'field' => 'nombre',
                      'label' => 'Nombre',
                      'rules' => 'trim|required|max_length[20]'
                    ),
                array(
                      'field' => 'apellidos',
                      'label' => 'Apellidos',
                      'rules' => 'trim|required|max_length[40]'
                    ),
                array(
                      'field' => 'nick',
                      'label' => 'Nick',
                      'rules' => 'trim|required|max_length[10]|is_unique[usuarios.nick]'
                    ),
                array(
                      'field' => 'password',
                      'label' => 'Contraseña',
                      'rules' => 'trim|required|matches[confirm_password]'
                    ),
                array(
                      'field' => 'confirm_password',
                      'label' => 'Confirmar Contraseña',
                      'rules' => 'trim|required' 
                    ),
                array(
                      'field' => 'email',
                      'label' => 'Email',
                      'rules' => 'trim|required|max_length[32]|valid_email'
                    )
                );

            $this->form_validation->set_rules($reglas);

            if ($this->form_validation->run() == FALSE){
                $this->load->view('usuarios/singup');

            }
            else{
    
                if ($this->Usuario->crear($nombre, $apellidos, $nick, $password, $email) === FALSE){
                    $data['error'] = "Error: No se ha creado el usuario";
                    $this->load->view('usuarios/singup',$data);
                }
                else{
                    $this->session->set_userdata('nick', $nick);
                    $this->session->set_userdata('password',$password);
                    $id = $this->Usuario->id_segun_nick_password($nick,$password);
                    $token = md5(rand());
                    $this->Usuario->meter_en_validaciones($id,$token);
                    $this->enviarCorreo($email, $id, $token);
                    
                    redirect("usuarios/login");   
                }
            }
        }
        else
        {
            $this->load->view('usuarios/singup');
        }
       
    }


    public function validar($id,$token){
        $token_usuario = $this->Usuario->obtener_token($id);
        
        if ($token === $token_usuario){
            $this->Usuario->borrar_validacion($id);
            $this->Usuario->cambiar_el_valor_de_valido($id);
            $usuario = $this->session->userdata('usuario');
            $password = $this->session->userdata('password');
            $this->loguear($usuario,$password);
            redirect("/home/index");
        }
        else{
            $this->load->view('usuarios/login');
        }
    }


    
    public function enviarCorreo($email, $id, $token){

        $this->load->library('email');
       $config['protocol'] = 'sendmail';
     
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['smtp_host'] = 'localhost';
        $config['smtp_port'] = '25';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] ="antonio_elpiolin89@hotmail.com" ;
        $config['smtp_pass'] ="antonio"; 

       

        $config['mailtype'] = 'text';
        $config['validation'] = TRUE;
        
        $this->email->initialize($config);
          $this->email->set_newline("\r\n");
        $this->email->from('iesdonana@gmail.com', 'webmaster');
        $this->email->to($email);
        $this->email->cc('otro@otro-ejemplo.com');
        $this->email->bcc('ellos@su-ejemplo.com'); 
        $this->email->subject('Prueba');
        $this->email->message('Registrado');
        //$this->email->send();

        if($this->email->send())
          {
           echo 'Correo enviado';
          }

          else
          {
           show_error($this->email->print_debugger());
          }

    }




}