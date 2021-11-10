<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/customer.css'); ?>">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  	<title>Pagos y Control de pagos.</title>
	  <link rel="shortcut icon" type="image/png" href="favicon.ico"/>

    <?php $session = session();?>
</head>
<body>

<div class="view-login">
  <div class="container">
    <div class="espacioDos"></div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="background-form">
          <form class="form-signin" action= "<?php echo site_url('/Comprobacion/check'); ?>" method="POST">
            <div class="text-center mb-4">
              <img class="mb-4" src="<?php echo base_url('logo/organic.png'); ?>" alt="" width="142" height="142">
            </div>
            <?php
            if($session->has('errorcredenciales')){ 
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $session->get('errorcredenciales');
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php  
            $session->remove('errorcredenciales');
            $session->destroy(); 
            }
            ?>

            <div class="form-label-group">
            <span class="labelLogin">Usuario.</span>  
            <input type="text" id="credencial" name="credencial" class="form-control form-control-sm" placeholder="" required="" autofocus="">
              
            </div>
            <div class="espacioUno"></div>
            <div class="form-label-group">
            <span class="labelLogin">Contraseña</span>  
            <input type="password" id="inputPassword" name="inputPassword" class="form-control form-control-sm" required="" placeholder="">
              
            </div>

            <div class="espacioUno"></div>

            <div class="text-center">
            <button class="btn btn-primary btn-sm" name="login" type="submit">Entrar</button>
            </div>

            <p class="mt-5 mb-3 text-muted text-center"> © Gerardo Flores <?php echo date("Y");?></p>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
    </div>
  </div>
</div>


<script src="<?php echo base_url('js/customer.js'); ?>"></script>

</body>
</html>
