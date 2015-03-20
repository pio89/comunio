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

    public function sw_search($keyword)
     {
        $this->db->select('nombre_comunidad');
        $this->db->from('comunidad');

       $this->db->like('nombre_comunidad', $keyword);
        $this->db->order_by("nombre_comunidad", "asc");
        
         $query = $this->db->get();
        foreach($query->result_array() as $row){
            //$data[$row['friendly_name']];
             $data[] = $row;
         }
         //return $data;
         return $query;
     }

}









