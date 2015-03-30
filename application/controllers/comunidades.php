<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidades extends CI_Controller {

	public function index()
	{
	
		 if ($this->session->userdata('id_usuario'))
        {
            $id_usuario = $this->session->userdata('id_usuario');
            $data['comunidad_id'] = $this->Comunidad->comunidad_por_id_usuario($id_usuario);
            $data['comentarios'] = $this->Comentario->ver_comentarios($data['comunidad_id']);
            
			$this->load->view('comunidad/index', $data);
		}
		else{
			 $this->load->view('usuarios/login');
		}
	}

	public function elegir_comunidad()
	{
		$data['comunidad'] = $this->Comunidad->mostrar_comunidades();
		$this->load->view('comunidad/elegircomunidad', $data);
	}

	public function unirse_comunidad()
	{
		 if ($this->input->post('id_comunidad'))
		 {
		 	$nick = $this->session->userdata('nick'); 
		 	$id_comunidad = $this->input->post('id_comunidad');
		 	$this->Comunidad->insertar_usuario_a_comunidad($id_comunidad, $nick);
		 	$this->load->view('comunidad/index');
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
 


  

}