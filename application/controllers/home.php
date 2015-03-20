<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('id_usuario'))
        {
            //$data['id_usuario'] = $this->session->userdata('id_usuario');
           /* $data['biblioteca'] = $this->Usuario->biblioteca($data['usuario_id']);
            $this->template->set('usuario', $this->session->userdata('usuario'));*/
            /* $this->template->set('id_usuario', $this->session->userdata('id_usuario'));
            $this->template->load('plantillas/comun', 'home/index', $data);
        */



            redirect('/usuarios/login');
        }
        else{
            redirect('/usuarios/login');
        }
/*
        $data['juegos'] = $this->Juego->destacados();
        $data['noticias'] = $this->Noticia->ultimas();
*/
        /*$this->template->set('titulo', 'Inicio');
        $this->template->load('plantillas/comun', 'home/index', $data);
        */
        
       // $this->load->view('/home/index');
    }
}