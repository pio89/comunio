<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model
{
    

    public function usuario_por_id($id)
    {
      $res = $this->db->query("select * 
                                from usuarios
                                where id_usuario = ?", array($id));
  
                                      
        return ($res->num_rows() > 0) ? $res->row_array() : FALSE;
    }  

    public function nombre_segun_id($id)
    {
      $res = $this->db->query("select nombre 
                                from usuarios
                                where id_usuario = ?", array($id));
  
                                      
        return ($res->num_rows() > 0) ? $res->row()->nombre : FALSE;
    }

    // LOGIN
    public function id_segun_nick_password($nick, $password)
    {

		return $this->id(array('nick' => $nick,
                               'password' => md5($password)));
	 }


	private function id($where)
    {
        $res = $this->db->select('id_usuario')->from('usuarios')->where($where)->get();
        return ($res->num_rows() > 0) ? $res->row()->id_usuario : FALSE;
    }

    /* COMPROBAR SI ESTA EN UNA COMUNIDAD O NO */
    public function comunidad_id_segun_nick_password($nick, $password)
    {

    return $this->id2(array('nick' => $nick,
                               'password' => md5($password)));
   }


    private function id2($where)
    {
        $res = $this->db->select('comunidad_id')->from('usuarios')->where($where)->get();
        return ($res->num_rows() > 0) ? $res->row()->comunidad_id : FALSE;
    }


    public function meter_en_validaciones($id,$token){
        $res = $this->db->query("insert into validaciones_pendientes (usuarios_id,token)
                                 values (?, ?)",
                                 array($id, $token));

    }

    public function crear($nombre, $apellidos, $nick, $password, $email){
        $res = $this->db->query("insert into usuarios (nombre, apellidos, nick, password, email)
                                 values (?,?,?, md5(?), ?)",
                                 array($nombre, $apellidos, $nick, $password, $email));

    }


    public function obtener_token($id){
        $res = $this->db->query("select token 
                                 from validaciones_pendientes
                                  where usuarios_id = ?",
                                  array($id));

        return $res->row()->token;
    }

   
}
