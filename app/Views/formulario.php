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





<div class="container"> <!--Inicia Container -->
    <div class="row">
        <div class="col-md-4 text-center"></div>
        <div class="col-md-4 text-center"><img src="<?php echo base_url('logo/organic.png'); ?>" width="151" height="151"></div>
        <div class="col-md-4 text-center"></div>
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
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <br/>
      ¿ Alumno nuevo / Alumno existente ?
      <br/>
      <br/>
      
        <select class="form-control form-control-sm" name="tipoAlumno" id="tipoAlumno">
          <option value="">Seleccione una opcion</option>
          <option value="1">Soy alumno nuevo</option>
          <option value="2">Ya soy Alumno</option>
        </select>
      </div>
      <div class="col-md-4"></div>

    </div>
<br/><br/>
<div id="alumnoNuevo">
    <div class="row">   
            <div class="col-md-2 text-center"></div>
              <div class="col-md-8">
              
              
                  <p class="titulo"> Datos Alumno </p>
                  <form action="<?php echo site_url('/Procesar/formulario'); ?>" method="post" onsubmit="return validacionNuevo()" enctype="multipart/form-data">
                  <div class="espacioDos"></div>
                  <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Nombre </label>
                          <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" required>
                        </div>
                        <div class="col-md-6">
                          <label for="correo">Apellido Paterno </label>
                          <input type="text" class="form-control form-control-sm" name="apaterno" id="apaterno" required>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Apellido Materno </label>
                          <input type="text" class="form-control form-control-sm" name="amaterno" id="amaterno" required>
                        </div>
                        <div class="col-md-6">
                          <label for="correo">Edad </label>
                          <input type="text" class="form-control form-control-sm" name="edad" id="edad" maxlength="2" required>
                        </div>
                  </div>


                  <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Teléfono </label>
                          <input type="text" class="form-control form-control-sm" name="telefonoNuevo" maxlength="10" id="telefonoNuevo" required>
                        </div>
                        <div class="col-md-6">
                          <label for="correo">Celular </label>
                          <input type="text" class="form-control form-control-sm" name="celularNuevo" maxlength="10" id="celularNuevo" required>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Correo </label>
                          <input type="text" class="form-control form-control-sm" name="correo" id="correo" required>
                        </div>
                        <div class="col-md-6">

                        </div>
                  </div>
                  <div class="espacioDos"></div>
                  <hr class="linea"/>
                  <div class="espacioDos"></div>
                  <p class="titulo">Datos Padre o Tutor</p>
                  <div class="espacioDos"></div>
                  <div class="row">
                        <div class="col-md-6">
                          <label for="Nombre">Nombre </label>
                          <input type="text" class="form-control form-control-sm" name="nombreTutor" id="nombreTutor" required>
                        </div>
                        <div class="col-md-6">
                        <label for="Apellido Paterno">Apelido Paterno </label>
                          <input type="text" class="form-control form-control-sm" name="apaternoTutor" id="apaternoTutor" required>
                        </div>
                  </div>

               
                  <div class="row">
                        <div class="col-md-6">
                          <label for="Apellido Materno">Apellido Materno </label>
                          <input type="text" class="form-control form-control-sm" name="amaternoTutor" id="amaternoTutor" required>
                        </div>
                        <div class="col-md-6">
                        <label for="parentesco"> Parentesco</label>
                          <input type="text" class="form-control form-control-sm" name="parentesco" id="parentesco" required>
                        </div>
                  </div>


                   <div class="row">
                        <div class="col-md-6">
                          <label for="telefono_casa">Telefono Casa </label>
                          <input type="text" class="form-control form-control-sm" name="telefonoTutor" id="telefonoTutor" maxlength="10" required>
                        </div>
                        <div class="col-md-6">
                        <label for="celular"> Celular</label>
                          <input type="text" class="form-control form-control-sm" name="celularTutor" id="celularTutor" maxlength="10" required>
                        </div>
                  </div>
                  <div class="espacioDos"></div>
                  <hr class="linea"/>
                  <div class="espacioDos"></div>
                  <p class="titulo">Datos de pago</p>
                  <div class="espacioDos"></div>

                  <div class="form-group">                 
                          <label for="Metodo d pago"> Metódo de pago</label>
                          <div class="form-check">
                          <input class="form-check-input form-control-sm" onclick="metodoPago()" type="radio" name="metodo_pago" value="deposito" id="deposito" required> 
                          <label class="form-check-label" for="exampleRadios1">
                              Deposito
                          </label>
                          </div>

                          <div class="form-check">
                          <input class="form-check-input form-control-sm" onclick="metodoPago()" type="radio" name="metodo_pago" value="transferencia" id="transferencia" required>
                          <label class="form-check-label" for="exampleRadios1">
                              Transferencia
                          </label>
                          </div>
                  </div>

                  <div class="espacioDos"></div>
                
                <div class="row">
                        <div class="col-md-6">
                          <label for="telefono_casa">Terminación ultimo 4 digitos cuenta </label>
                          <input type="text" class="form-control form-control-sm" name="cuatro_dijitos" id="cuatro_dijitos" maxlength="4" required>
                        </div>
                        <div class="col-md-6">
                        <label for="celular"> Sucursal Interes</label>
	


                          
                        
                          <select class="form-control form-control-sm" name="sucursal" id="sucursal" required>
                          <option value="">Seleccione una opción</option>
						              <?php
                        	if(empty(getSucursales())){
							              echo "<h5>No existen sucursales asignadas.</h5>";
						              }else{?>
						              <?php foreach (getSucursales() as $fila) { ?>
                            <option value="<?php echo $fila->id;?>"><?php echo $fila->nombre;?></option>
                            <?php
						  	            }
                          }
                          ?>
                          </select>
                        </div>
                </div>
                  
                  
                  <div class="espacioDos"></div>

                <div id="depositoInfo">
                    <div class="row">
                        <div class="col-md-6">
                          <label for="afiliacion">Afiliación </label>
                          <input type="text" class="form-control form-control-sm" name="afiliacion" id="afiliacion">
                        </div>
                        <div class="col-md-6">
                        <label for="autorizacion"> Autorización</label>
                          <input type="text" class="form-control form-control-sm" name="autorizacion" id="autorizacion">
                        </div>
                    </div>
                </div>
                
               

                <div id="transferenciaInfo">
                  <div class="row">
                    <div class="col-md-6">
                          <label for="afiliacion"> Clave rastreo </label>
                          <input type="text" class="form-control form-control-sm" name="clave_rastreo" id="clave_rastreo">
                    </div>
                    <div class="col-md-6">
                        <label for="autorizacion"> Referencia</label>
                          <input type="text" class="form-control form-control-sm" name="referencia" id="referencia">
                    </div>
                  </div>
                </div>
                <div class="espacioDos"></div>

                <div class="form-group">
                      <p>Cargar imagen o Tomar una foto.</p>
                      <input type="file" name="mypic" id="mypic" accept="image/*" required>
                      </div>
                      
                      
                      <div class="form-group">
                      <canvas id="mostrar-foto"></canvas>
                      </div>

                      <div class="espacioDos"></div>
                  <div class="text-center">
                    <button type="submit" name="btnAlumnoNuevo" id="btnAlumnoNuevo" class="btn btn-primary btn-sm"> Enviar. </button>
                  </div>
                  <div class="espacioDos"></div>
              </form>
              <br/><br/><br/>
              </div>
            <div class="col-md-2"></div>
    </div>
    </div>



<!-- ######################################## Inicia form de alumno ya inscrito -->


<div id="alumno">
    <div class="row">   
            <div class="col-md-2 text-center"></div>
              <div class="col-md-8">
              
              <form name="formexiste" action="<?php echo site_url('/Procesar/formulario'); ?>" method="post" onsubmit="return validacionExiste()" id="formexiste" enctype="multipart/form-data">
              <p class="titulo">Datos alumno</p>
                      <div class="row">
                        <div class="col-md-6">
                          
                          <label for="nombre">Nombre </label>
                          <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" required>
                        </div>
                        <div class="col-md-6">
                          <label for="ApellidoPaterno">Apellido Paterno </label>
                          <input type="text" class="form-control form-control-sm" name="apaterno" id="apaterno" required>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Apellido Materno </label>
                          <input type="text" class="form-control form-control-sm" name="amaterno" id="amaterno" required>
                        </div>
                        <div class="col-md-6">
                          <label for="correo">Correo </label>
                          <input type="email" class="form-control form-control-sm" name="correo" id="correo" required>
                        </div>
                      </div>

                
                      <div class="row">
                        <div class="col-md-6">
                          <label for="nombre">Teléfono </label>
                          <input type="text" class="form-control form-control-sm" name="celular" maxlength="10" id="celular" required>
                        </div>
                        <div class="col-md-6">

                        </div>
                      </div>










                      <div class="espacioDos"></div>
                  <hr class="linea"/>
                  <div class="espacioDos"></div>
                  <p class="titulo">Datos de pago</p>
                  <div class="espacioDos"></div>

                  <div class="form-group">                 
                          <label for="Metodo d pago"> Metódo de pago</label>
                          <div class="form-check">
                          <input class="form-check-input form-control-sm" onclick="metodoPagoExiste()" type="radio" name="metodo_pago" value="deposito" id="depositoExiste" required> 
                          <label class="form-check-label" for="exampleRadios1">
                              Deposito
                          </label>
                          </div>

                          <div class="form-check">
                          <input class="form-check-input form-control-sm" onclick="metodoPagoExiste()" type="radio" name="metodo_pago" value="transferencia" id="transferenciaExiste" required>
                          <label class="form-check-label" for="exampleRadios1">
                              Transferencia
                          </label>
                          </div>
                  </div>

                  <div class="espacioDos"></div>
                
                <div class="row">
                        <div class="col-md-6">
                          <label for="telefono_casa">Terminación ultimo 4 digitos cuenta </label>
                          <input type="text" class="form-control form-control-sm" name="cuatro_dijitos" id="cuatro_dijitos" maxlength="4" required>
                        </div>
                        <div class="col-md-6">
                        <label for="celular"> Sucursal Interes</label>


                          
                        
                          <select class="form-control form-control-sm" name="sucursal" id="sucursal" required>
                          <option value="">Seleccione una opción</option>
						              <?php
                        	if(empty(getSucursales())){
							              echo "<h5>No existen sucursales asignadas.</h5>";
						              }else{?>
						              <?php foreach (getSucursales() as $fila) { ?>
                            <option value="<?php echo $fila->id;?>"><?php echo $fila->nombre;?></option>
                            <?php
						  	            }
                          }
                          ?>
                          </select>
                        </div>
                </div>
                  <div class="espacioDos"></div>

                <div id="depositoInfoExiste">
                    <div class="row">
                        <div class="col-md-6">
                          <label for="afiliacion">Afiliación </label>
                          <input type="text" class="form-control form-control-sm" name="afiliacion" id="afiliacionExiste">
                        </div>
                        <div class="col-md-6">
                        <label for="autorizacion"> Autorización</label>
                          <input type="text" class="form-control form-control-sm" name="autorizacion" id="autorizacionExiste">
                        </div>
                    </div>
                </div>
                
               

                <div id="transferenciaInfoExiste">
                  <div class="row">
                    <div class="col-md-6">
                          <label for="afiliacion"> Clave rastreo </label>
                          <input type="text" class="form-control form-control-sm" name="clave_rastreo" id="clave_rastreoExiste">
                    </div>
                    <div class="col-md-6">
                        <label for="autorizacion"> Referencia</label>
                          <input type="text" class="form-control form-control-sm" name="referencia" id="referenciaExiste">
                    </div>
                  </div>
                </div>
                <div class="espacioDos"></div>


                      <div class="espacioDos"></div>

                      <div class="form-group">
                      <p>Cargar imagen o Tomar una foto.</p>
                      <input type="file" name="baucher" id="baucher" accept="image/*" required>
                      </div>
                      


                      
                      <div class="col">
                      <canvas id="mostrar-baucher"></canvas>
                      </div>

                      <div id="mostrarProgressBar">

                      <div class="espacioDos"></div>
                      <div class="class">
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                      </div>
                      </div>


                      <div class="espacioDos"></div>
                  <div class="text-center">
                    <button type="submit" name="btnAlumnoInscrito" id="btnAlumnoInscrito" class="btn btn-primary btn-sm"> Enviar. </button>
                  </div>
                  <div class="espacioDos"></div><div class="espacioDos"></div>
                  </form>
              </div>
            <div class="col-md-2 text-center"></div>
			
    </div>
</div>

</div><!--Termima container-->


<script src="<?php echo base_url('js/customer.js'); ?>"></script>

</body>
</html>
