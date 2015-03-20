<!DOCTYPE html>
<html>
  <head>
    <title>Singup</title>
     <style type="text/css">
    

    html{
      background-color: green;
    }

    body{
      display: flex;
      -webkit-flex-direction: column;
      -moz-flex-direction: column;
      -ms-flex-direction: column;
      -o-flex-direction: column;
      flex-direction: column;
      text-align: center;
       justify-content: center;

    }

    div{
      display: flex;
       -webkit-flex-direction: column;
      -moz-flex-direction: column;
      -ms-flex-direction: column;
      -o-flex-direction: column;
      flex-direction: column;
      background-color: #9CED63;
     
      text-align: center;
      padding: 10px;
      margin: auto;
      max-width: 200px;

       border-radius: 15px;
        
    }


    form > input{
      margin-bottom: 10px;
      width: 200px;
    }

    </style>
  </head>
  <body>
    <div>
    <?= validation_errors() ?>
  
    <?php if (isset($error)): ?>
      <h2><?= $error ?></h2>
    <?php endif ?>

    <?= form_open('usuarios/singup') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Apellidos:', 'apellidos') ?>
      <?= form_input('apellidos', set_value('apellidos')) ?><br/>
      <?= form_label('Nick:', 'nick') ?>
      <?= form_input('nick', set_value('nick')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password') ?><br/>
      <?= form_label('Confirmar contraseña:', 'confirm_password') ?>
      <?= form_password('confirm_password') ?><br/>
      <?= form_label('Email:','email') ?>
      <?= form_input('email',set_value('email')) ?><br>
      <?= form_submit('singup', 'Crear') ?>
    <?= form_close() ?>
    <p><a href="<?php echo site_url('usuarios/login'); ?>">Volver </a></p>
    </div>
  </body>
</html>