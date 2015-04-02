<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentario extends CI_Model
{
  public function crear_comentario($texto_comentario, $id_comunidad, $usuarios_id)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario, comunidad_id, usuarios_id)
                                 values (?, ?, ?)",
                                 array($texto_comentario, $id_comunidad, $usuarios_id));
  }

  public function comentario_bienvenida($nick, $comunidad_id, $id_usuario)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario, comunidad_id, usuarios_id)
                                 values (?, ?, ?)",
                                 array('Se ha unido a la partida '.$nick, $comunidad_id, $id_usuario));
  }

  public function ver_comentarios($comunidad_id)
  {
    $res = $this->db->query('select u.nick, c.fecha, c.texto_comentario
                             from comentarios c, usuarios u
                             where u.id_usuario = c.usuarios_id and c.comunidad_id = ? order by c.fecha desc',
                             array($comunidad_id));
                                      
    return $res->result_array();
  }

  public function comprobar_si_tiene_comentario_bienvenida($id_usuario)
    {
      $res = $this->db->query('select * from comentarios where usuarios_id= ?', array($id_usuario));
  
                                      
        return ($res->num_rows() > 0) ? TRUE : FALSE;
    }

  public function insertar_comentario($texto_comunidad, $comunidad_id, $id_usuario)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario, comunidad_id, usuarios_id)
                                 values (?, ?, ?)",
                                 array($texto_comunidad, $comunidad_id, $id_usuario));
  }
}