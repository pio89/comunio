<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidades extends CI_Controller {

	public function __construct()
	{
	parent::__construct();

		

		if (!$this->Usuario->id_usuario_logueado() && !$this->Usuario->nick_logueado()) 
		{
            redirect('usuarios/login');
        }
        
	
		

	} 

	public function index()
	{
	
		if ($this->Comunidad->comprobar_id_comunidad())
		{
            $id_usuario = $this->session->userdata('id_usuario');
            $data['comunidad_id'] = $this->Comunidad->comunidad_por_id_usuario($id_usuario);
            $data['comentarios'] = $this->Comentario->ver_comentarios($data['comunidad_id']);
            $this->template->load('plantillas/comun', 'comunidad/index', $data);
        }
        else
        {
        	echo 'tonto';
        }
			
		
	}

	public function elegir_comunidad()
	{	

		if ($this->Comunidad->comprobar_id_comunidad()) 
		{
            redirect('comunidades/index');
        }
		else{
			$data['comunidad'] = $this->Comunidad->mostrar_comunidades();
			$this->load->view('comunidad/elegircomunidad', $data);
		}
			
	
	}

	public function unirse_comunidad()
	{
		
        if ($this->Comunidad->comprobar_id_comunidad()) 
		{
            redirect('comunidades/index');
        }  
        else{



			if ($this->input->post('id_comunidad'))
			{
			 	$nick = $this->session->userdata('nick');
			 	
			 	$id_usuario = $this->session->userdata('id_usuario');
			 	
			 	$id_comunidad = $this->input->post('id_comunidad');
			 	
			 	$this->Comunidad->insertar_usuario_a_comunidad($id_comunidad, $nick);
			 	// problema en donde crear el user data
			 	$this->session->set_userdata('id_comunidad',$id_comunidad); 

				 	if($this->Comentario->comprobar_si_tiene_comentario_bienvenida($id_usuario) == FALSE)
				 	{
				 		$this->Comentario->comentario_bienvenida($nick, $id_comunidad, $id_usuario);
				 	}
			 	redirect('comunidades/index');
			}
		}
		
		
	}

	public function unirse_comunidad_con_password()
	{

		if ($this->Comunidad->comprobar_id_comunidad()) 
		{
            redirect('comunidades/index');
        }
        else
        {

		if($this->input->post('password_comunidad') && $this->input->post('password') && $this->input->post('id_comunidad'))
		{
		$password_comunidad = $this->input->post('password_comunidad');
		$password = $this->input->post('password');

			if($password_comunidad != '' && $password != '' && md5($password) == $password_comunidad)
			{
				$nick = $this->session->userdata('nick');
		 		$id_usuario = $this->session->userdata('id_usuario');
		 		$id_comunidad = $this->input->post('id_comunidad');
		 	
		 		$this->Comunidad->insertar_usuario_a_comunidad($id_comunidad, $nick);
		 		// problema en donde crear el user data
		 		$this->session->set_userdata('id_comunidad',$id_comunidad); 

		 		if($this->Comentario->comprobar_si_tiene_comentario_bienvenida($id_usuario) == FALSE)
		 		{
		 			$this->Comentario->comentario_bienvenida($nick, $id_comunidad, $id_usuario);
		 			redirect('comunidades/index');
		 		}
		 		else{
		 		$data['error'] = true;
		 		$data['comunidad'] = $this->Comunidad->mostrar_comunidades();
				$this->load->view('comunidad/elegircomunidad', $data);
                //$this->load->view('comunidad/elegircomunidad', $data);
		 		}


			}
			else{
				$data['error'] = true;
				$data['comunidad'] = $this->Comunidad->mostrar_comunidades();
				$this->load->view('comunidad/elegircomunidad', $data);
                //$this->load->view('comunidad/elegircomunidad', $data);
			}
		}
		
		}
		
	}

	public function buscar_comunidad($item)
	{
		 if ($this->input->post('item'))
		 {
		 	echo 'true';
		 }
		 else{
		 	echo 'false';
		 }
	}

	public function comentar(){
		if ($this->Comunidad->comprobar_id_comunidad()) 
		{
			$texto_comunidad = $this->input->post('texto_comentario');
			$id_usuario = $this->session->userdata('id_usuario');
			$comunidad_id = $this->session->userdata('id_comunidad');
			$this->Comentario->insertar_comentario($texto_comunidad, $comunidad_id, $id_usuario);
			$this->index();
            
        }
	}

	public function buscar_conunidades()
	{
		echo 'ff';
	}
 


  

}