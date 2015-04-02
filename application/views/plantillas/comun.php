<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="UTF-8">

    <title><?=$titulo?></title>
    <?= link_tag('css/estilo.css') ?>
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
		#menu{
			display: flex;
			-webkit-flex-direction: row;
			-moz-flex-direction: row;
			-ms-flex-direction: row;
			-o-flex-direction: row;
			flex-direction: row;
			height: 50px;
			text-align: center;
			line-height: 40px;
			background-color: #19FD47;
		}

		#menu > div{
			flex: 1;
			border: 3px white solid;
		}







		#menu > div:hover{
  			background-color: #4D79C7;
		}

		#menu > div:hover > a{
  			color: black;
		}
		

		#menu > div > a{
		  color: black;
		  font-size: 18px;
		  display: block;
		  
		}






		#comentario{
			background-color: #ABF175;
			height: 100px;
			margin-bottom: 20px;
		}
		#comentario > span{
			background-color: #3F682B;
			display: flex;

		}
		#comentario > p{
			margin-top: 20px;
			
		}

	</style>

	</head>
	<body>
    	<header>
     		<h1>COMUNIO</h1>
    	</header>

		<nav>
			<?= cabecera_comunidad() ?>
		</nav>

   		<nav id="menu">
			<div>
			<?= anchor('comunidades/index', "Muro") ?>
			</div>
			<div>Alineacion</div>
			<div>Clasificacion</div>
			<div>Mercado de fichajes</div>
		</nav>
		<hr>

		<h1> MURO </h1>
    
    	<?= $contents ?>

    	<footer>
       	 	<p>&copy; Copyright: 2DAW IES Doñana</p>
    	</footer>

</body>
</html>

