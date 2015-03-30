<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function login_logout()
{
     $CI =& get_instance();
     
      if($CI->session->userdata('nick') != ''):
        
        $nick = $CI->session->userdata('nick');

      
        ?><div>
        <label>Nombre de usuario:</label>
         <span><?= $nick ?></span><br/>
        </div>
        <div>
          <button class="btn btn-info"><?=anchor('/usuarios/logout', 'Log Out')?></button>
        </div><?php
        
        else:

          redirect('/usuarios/login');
           

      endif;
}

function cabecera_comunidad()
{
     $CI =& get_instance();
     
      if($CI->session->userdata('nick') != ''):
        
        $nick = $CI->session->userdata('nick');
    	$nombre_comunidad = $CI->Comunidad->nombre_segun_nick($nick);
      
        ?>
        <div>
        <label>Nombre de usuario:</label>
         <span><?= $nick ?></span><br/>
         <label>Comunidad:</label>
         <span><?= $nombre_comunidad ?></span> <br/>
         </div>
		<div>
         <button><?=anchor('/usuarios/logout', 'Log Out')?></button>
		</div>
         <?php
        
        else:

          redirect('/usuarios/login');
           

      endif;
}