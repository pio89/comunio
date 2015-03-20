<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidades extends CI_Controller {

	public function index()
	{
		$this->load->view('comunidad/index');
	}

	public function elegir_comunidad()
	{
		$this->load->view('comunidad/elegircomunidad');
	}

	public function search()
	{
		$keyword = $this->input->post('term');
 
 		$data['response'] = 'false'; //Set default response
 
 		$query = $this->Comunidad->sw_search($keyword); //Model DB search
 
 if($query->num_rows() > 0){
    $data['response'] = 'true'; //Set response
    $data['message'] = array(); //Create array
    foreach($query->result() as $row){
 	  $data['message'][] = array('label'=> $row->friendly_name, 'value'=> $row->friendly_name); //Add a row to array
    }
 }
 echo json_encode($data);
	}
 


  

}