
		 <?= validation_errors() ?>
	  
	    <?php if (isset($error)): ?>
	      <p style="color:red;"><?= $error ?></p style="color:red;">
	    <?php endif ?>

		  <?= form_open('comunidades/comentar') ?>
	      <?= form_textarea(array('name' => 'texto_comentario', 
	      											  'cols' => '50', 
	      											  'rows' => '1', 
	      											  'maxlength' => '500')) ?>
	      <?= form_submit('comentar', 'Comentar') ?>
	    <?= form_close() ?>


	    
		<br>
		<?php 
		//rellena los comentarios

		foreach ($comentarios as $item):?>
 		<div id="comentario"><span><?= $item['nick'] ?>
		<?= $item['fecha'] ?></span>
		 	<p><?= $item['texto_comentario'] ?></p>
		 </div>
	
		 
	 	<?php endforeach;?>
 

		

