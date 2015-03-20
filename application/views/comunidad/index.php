<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
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

		</style>
	</head>
	<body>
		<header><h1>COMUNIO</h1></header>
		<nav>
		<?= cabecera_comunidad() ?>
		</nav>
		<hr>
		<h1> Bienvenido </h1>

		
	</body>
</html>
