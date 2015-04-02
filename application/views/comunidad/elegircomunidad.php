<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url("/recursos/css/bootstrap.css") ?>">
			<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
			text-decoration: none;
		}
		
		html{
			
			background-color: #85B844;
		}
		
		body{
			display: flex;
			max-width: 1000px;
			margin: 30px auto;
			flex-direction: column;
		
		}
		/***************** CABECERA ****************/
		body > header{
			display: flex;
			flex-direction: column;
			text-align: center;
			background-color: green;
			height: 150px;
			color: white;
			line-height: 140px;
		}
		body > header > h1{
			font-size: 100px;
		}

		body > header + nav{
			display: flex;
			-webkit-flex-direction: row;
			-moz-flex-direction: row;
			-ms-flex-direction: row;
			-o-flex-direction: row;
			flex-direction: row;
			background-color: #236D1C;
		}
		body > header + nav > div{
			line-height: 30px;
		}
		body > header + nav > div:first-of-type{
			flex:4;
		}
		body > header + nav > div:last-of-type{
			flex:1;
			margin-left: 60px;
			line-height: 50px;

		}
		body > header + nav > div:last-of-type > button{
			transform: scale(1.4);
		}

		table{
			width:50%;
			margin-top: 20px;
			text-align: center;
		}
		th, td{
			text-align: center;
		}
		nav + section > h2{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 35px;
		}
		section{
			background-color: #85B844;
		}

		.modal-header
         {
             padding:9px 15px;
             
             background-color: #68F30F;
         }
         .modal-button
         {
             padding:9px 15px;
             
             background-color: #68F30F;
         }
         .btn-success{
			transform: scale(0.9);
         }
         .modal{
         	position:fixed;
         	 display: none;
	        top: 25%;
	        left: 25%;
	        width: 50%;
	        height: 50%;
	        padding: 16px;


	      
	        color: #333;

	        overflow: auto;
         }
		</style>

	
		<script src="<?= base_url("/js/jquery.js") ?>"></script>
		<script src="<?= base_url("/recursos/js/bootstrap.js") ?>"></script>
	
		
	
		<script type="text/javascript">

		var texto;
		
		function mostrarCadena()
		{
			texto = document.getElementById('autocompletado').value;

			$.post("index.php/comunidades/buscar_conunidades/", {q:texto}, function(dede){
				

			  	//document.getElementById('respuesta').innerHTML = dede;
			  	$("#respuesta").html(dede);
			 
			})


		}
		
		</script>
	</head>
	<body>
		<header><h1>COMUNIO</h1></header>
		<nav>
			<?= login_logout() ?>
		</nav>
		
		<section>
		<h2>Elige comunidad</h2>
		<a href=""></a>

		 <p><label for='autocomplete'>Nombre de Usuario: </label><input type='text' onkeyup="mostrarCadena()" id='autocompletado'/></p>

		<div id="respuesta"></div>

		 <table style="text-align: center; border: solid 2px black;">
	 	<thead>
	 		<tr>
			 	
			 	<th>Comunidad</th>
			 	<th>Nº Jugadores</th>
			 	<th>Disponibilidad</th>
			 	
		 	</tr>
	 	</thead>

	<tbody>
		<?php foreach ($comunidad as $item):?>
 		<tr>
		 	<td><?= $item['nombre_comunidad'] ?></td>
			<td><?= $item['n_judadores'] ?></td>
		 	<td>
		 		<?php
		 		if( $item['password_comunidad'] != '')
				{?>
					
		 			<?= form_open('comunidades/unirse_comunidad_con_password') ?>
				      <?= form_hidden('id_comunidad', $item['id_comunidad']); ?>
				      <?= form_hidden('nombre_comunidad', $item['nombre_comunidad']); ?>
				      <?= form_hidden('password_comunidad', $item['password_comunidad']); ?>
				      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $item['id_comunidad'] ?>">
 						Unirse		
						</button>
						
						
						<img src="<?= base_url("/imagenes/iconos/encrypted.png") ?>" />
						
						<div class="modal fade" id="<?= $item['id_comunidad'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Introduce la contraseña de la comunidad <?= $item['nombre_comunidad'] ?></h4>
					      </div>
					      <div class="modal-body">
					      	 <div class="form-group">
                                 
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" placeholder="Contraseña comunidad" title="Please enter your password">
                                  <span class="help-block"></span>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					        <button type="button" onclick="this.form.submit()" class="btn btn-primary">Aceptar</button>
					      </div>
					    </div>
					  </div>
					</div>

					<?= form_close() ?>

				<?php 
				} else{

				
  				?> 
				    
		 		<?= form_open('comunidades/unirse_comunidad') ?>
				      <?= form_hidden('id_comunidad', $item['id_comunidad']); ?>
				      <?= form_hidden('nombre_comunidad', $item['nombre_comunidad']); ?>
				      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $item['id_comunidad'] ?>">
 						Unirse		
						</button>
						
						
						
						<div class="modal fade" id="<?= $item['id_comunidad'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">¿Seguro que quiere unirte a la partida <?= $item['nombre_comunidad'] ?></h4>
					      </div>
					      <div class="modal-body">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					        <button type="button" onclick="this.form.submit()" class="btn btn-primary">Aceptar</button>
					      </div>
					    </div>
					  </div>
					</div>

					<?= form_close() ?>

				<?php 
				}
  				?>

			</td>	
					
	 	</tr>
	 	<?php endforeach;?>
 	<tbody>


 </table>



<!-- Modal -->

<?php if (isset($error)): ?>
      <h2>Error: los datos no son correctos</h2>
    
    <?php endif ?>



</section>
	</body>
</html>
