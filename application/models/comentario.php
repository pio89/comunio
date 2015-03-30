<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentario extends CI_Model
{
  public function crear_comentario($texto_comentario, $comunidad_id, $usuarios_id)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario,comunidad_id,usuarios_id)
                                 values (?, ?, ?)",
                                 array($texto_comentario, $comunidad_id, $usuarios_id));
  }

  public function ver_comentarios($comunidad_id)
  {
    $res = $this->db->query('select u.nick, c.fecha, c.texto_comentario
                             from comentarios c, usuarios u
                             where u.id_usuario = c.usuarios_id and c.comunidad_id = ?',
                             array($comunidad_id));
                                      
    return $res->result_array();
  }
}