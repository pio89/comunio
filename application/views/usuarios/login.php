<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Login</title>
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
    <?php if (isset($error)): ?>
      <h2>Error: los datos no son correctos</h2>
    <?php endif ?>

    <?= form_open('usuarios/login') ?>
      <?= form_label('Nick:', 'nick') ?><br/>
      <?= form_input('nick') ?><br/>
      <?= form_label('Password:', 'password') ?><br/>
      <?= form_password('password') ?><br/>
      <?= form_submit('login', 'Entrar') ?>
    <?= form_close() ?>

    <?= form_open('usuarios/singup') ?>
      <?= form_submit('insertar', 'Singup') ?>
    <?= form_close() ?>

    </div>
  </body>
</html>