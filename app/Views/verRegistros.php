<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/customer.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>"  type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('fontawesome-free/css/all.css'); ?>">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  	<title>Pagos y Control de pagos.</title>
	  <link rel="shortcut icon" type="image/png" href="favicon.ico"/>

    <?php $session = session();?>
</head>
<body>





<div class="container-fluid"> <!--Inicia Container -->
    <div class="row">
        <div class="col-md-4 text-center"></div>
        <div class="col-md-4 text-center"><img src="<?php echo base_url('logo/organic.png'); ?>" width="151" height="151"></div>
        <div class="col-md-4 text-right align-middle"><a href="<?php echo site_url('/Home/salir'); ?>">Salir</a></div>
    </div>

    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4"> 
        <?php
            if ($session->has('mensaje-recurso')) {
            ?>
              <div class="alert <?php echo $session->get('tipo-mensaje'); ?> alert-dismissible fade show" role="alert">
                <?php echo $session->get('mensaje-recurso'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
              $session->remove('mensaje-recurso');
            }
            ?>
          
          </div>
      <div class="col-md-4"></div>
    </div>        

    <div class="row">
      <div class="col-md-12">
      <?php 
          if(empty($pagos)){
            echo "<h5>No existen Pagos registrados.</h5>";
          }else{?>
            <table class="tabla-registros" width="100%" cellspacing="6" cellpadding="8">
              <thead>
                <tr>
                  <th>
                    <p class="font-weight-bold text-left">ID</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-left">Tipo Alumno:</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Nombre:</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Apellido Paterno.</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Apellido Materno.</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Celular</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Correo</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Metodo Pago</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Terminación Cuenta</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Afiliación</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Autorización</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Rastreo</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Referencia</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Fecha Registro</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Sucursal</p>
                  </th>
                  <th>
                    <p class="font-weight-bold text-center">Ver Baucher</p>
                  </th>
                  <?php
                  if($session->get('idRoll')==3){
                  ?>
                  <th class="text-left">
                    <p class="font-weight-bold text-center">Aplicar pago</p>
                  </th>
                  <?php
                  }
                  ?>
                  </tr>
              </thead>
              <?php
              foreach ($pagos as $fila) {
              ?>
                <tr>
                  <td class="text-left"><?=$fila['id'];?></td>
                  <td class="text-left"><?=($fila['tipoAlumno']==1 ? 'Alumno Nuevo' : 'Alumno existente');?></td>
                  <td class="text-left"><?=$fila['nombre'];?></td>
                  <td class="text-left"><?=$fila['apellidoPaterno'];?></td>
                  <td class="text-left"><?=$fila['apellidoMaterno'];?></td>
                  <td class="text-left"><?=$fila['celular'];?></td>
                  <td class="text-left"><?=$fila['correo'];?></td>
                  <td class="text-left"><?=$fila['metodoPago'];?></td>
                  <td class="text-left"><?=$fila['terminacionCuatroDigitos'];?></td>
                  <td class="text-left"><?=$fila['afiliacion'];?></td>
                  <td class="text-left"><?=$fila['autorizacion'];?></td>
                  <td class="text-left"><?=$fila['claveRastreo'];?></td>
                  <td class="text-left"><?=$fila['referencia'];?></td>
                  <td class="text-left"><?=$fila['fecha_creacion'];?></td>
                  <?php $sucursal = getSucursal($fila['sucursalInteres']);?>
                  <td class="text-left"><?php echo $sucursal->nombre;?></td>
                  <td class="text-center">
                  <?php $ruta = base_url($fila['rutaImagen']); ?>  
                  <a class="text-weight" href="#" onclick="mostrarBaucher('<?php echo $ruta;?>')"> 
                  <i class="fas fa-images"></i>
                  </a>
                  <?php
                  if($session->get('idRoll')==3){
                  ?>
                     <td class="text-left">
                     <a href="" onclick="aplicarPago(<?php echo $fila['id'];?>,'<?php echo site_url('Ajax/updatepago');?>')">Aplicar Pago</a></td>
                  <?php
                  }
                  ?>

                </tr>
              <?php
              }
              ?>
            </table>
            <?php } ?>
            <div class="espacioUno"></div>
            <?php 
            echo $paginador->links();
            ?>


      </div>
    </div>


</div><!--Termima container-->
<div id="mostrarBaucher">
</div>



</body>
</html>
<script src="<?php echo site_url('js/customer.js'); ?>"></script>