<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.10.custom.min.js"></script>
        

		<script type="text/javascript">
		$("#autocompletado").autocomplete({
 		minLength: 1,
  		source: function(req, add){
  		$.ajax({
  			url: '/search', //Controller where search is performed
  			dataType: 'json',
 			type: 'POST',
 			data: req,
 			success: function(data){
 				if(data.response =='true'){
 				   add(data.message);
 				}
 			}
 		});
 	}
 });
		</script>
	</head>
	<body>
		<?= login_logout() ?>
		<hr>
		<h1>Elige comunidad</h1>
	

		 <p><label for='autocomplete'>Nombre de Usuario: </label><input type='text' id='autocompletado'></p>
	</body>
</html>
