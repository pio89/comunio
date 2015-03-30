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
		}
		nav + section > h2{
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 35px;
		}


		</style>

	
		<script src="<?= base_url("/js/jquery.js") ?>"></script>
		<script src="<?= base_url("/recursos/js/bootstrap.js") ?>"></script>
	
		
	
		<script type="text/javascript">
		window.onload = function(){
		/*$(document).ready(function(){
			
		 var url = 'index.php/comunidades/buscar_comunidad/'; 
 
 		$('#autocompletado').autocomplete({
    	source: 'index.php/comunidades/buscar_comunidad?item=autocompletado'
  		});
  
    	

		});
*/


		$(document).ready(function(){
    //utilizamos el evento keyup para coger la información
    //cada vez que se pulsa alguna tecla con el foco en el buscador
    $(".autocompletar").keyup(function(){
                    
        //en info tenemos lo que vamos escribiendo en el buscador
        var info = $(this).val();
        //hacemos la petición al método autocompletar del controlador autocompletado
        //pasando la variable info
        $.post('autocompletado/autocompletar',{ info : info }, function(data){
                        
            //si autocompletado nos devuelve algo
            if(data != '')
            {
    
                //en el div con clase contenedor mostramos la info
                $(".contenedor").html(data);
                                
            }else{
                                
                $(".contenedor").html('');
                                
            }
        })
                    
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

		 <p><label for='autocomplete'>Nombre de Usuario: </label><input type='text' id='autocompletado'/></p>



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
		 		
		 			<?= form_open('comunidades/unirse_comunidad') ?>
				      <?= form_hidden('id_comunidad', $item['id_comunidad']); ?>
				      <?= form_submit('unirse', 'Unirse') ?>
				    <?= form_close() ?>
		 		

			</td>	
					
	 	</tr>
	 	<?php endforeach;?>
 	<tbody>


 </table>
</section>
	</body>
</html>
