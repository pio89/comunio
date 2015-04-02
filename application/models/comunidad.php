<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad extends CI_Model
{

	public function nombre_segun_nick($nick)
    {
      $res = $this->db->query("select c.nombre_comunidad
                                from usuarios u, comunidad c
                                where u.comunidad_id = c.id_comunidad and u.nick = ?", array($nick));
  
                                      
        return ($res->num_rows() > 0) ? $res->row()->nombre_comunidad : FALSE;
    }

    public function mostrar_comunidades()
    {
    	$res = $this->db->query("select id_comunidad, nombre_comunidad, password_comunidad, count(comunidad_id) as n_judadores from usuarios u, comunidad c where u.comunidad_id = c.id_comunidad group by id_comunidad;");
  
                                      
        return ($res->num_rows() > 0) ? $res->result_array() : FALSE;
    }

    public function insertar_usuario_a_comunidad($id_comunidad, $nick)
    {
       $res = $this->db->query("update usuarios
                                 set comunidad_id = ?
                                 where nick = ?",
                                 array($id_comunidad, $nick));
    }

    public function comunidad_por_id_usuario($id_usuario)
    {
        $res = $this->db->query("select comunidad_id from usuarios where id_usuario = $id_usuario", array($id_usuario));
        return ($res->num_rows() > 0) ? $res->row()->comunidad_id : FALSE;
    }

    public function comprobar_id_comunidad()
    {
        $id_comunidad = $this->session->userdata('id_comunidad');
        return ($id_comunidad === FALSE) ? FALSE : $id_comunidad;
    }
   

}









