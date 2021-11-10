<?php

namespace App\Controllers;
use  App\Models\Pagos;
class Procesar extends BaseController
{
    public function formulario()
    {
        // obtener toda la informaciòn
        // Ingresar los datos en la base de datos
        // Subir la imagen.
            $REQUEST = \Config\Services::request();
            $hoy = date("Y-m-d H:i:s");

            //$tipoAlumno = $REQUEST->getPost('tipoAlumno');

            
            if(isset($_POST['btnAlumnoNuevo'])){
                $tipoAlumno=1;
                $nombre     = $REQUEST->getPost('nombre');
                $apaterno   = $REQUEST->getPost('apaterno');
                $amaterno   = $REQUEST->getPost('amaterno');
                $edad       = $REQUEST->getPost('edad');
                $telefono   = $REQUEST->getPost('telefonoNuevo');
                $celular    = $REQUEST->getPost('celularNuevo');
                $correo     = $REQUEST->getPost('correo');
    
    
                $nombreTutor    = $REQUEST->getPost('nombreTutor');
                $apaternoTutor  = $REQUEST->getPost('apaternoTutor');
                $amaternoTutor  = $REQUEST->getPost('amaternoTutor');
                $parentesco     = $REQUEST->getPost('parentesco');
                $telefonoTutor  = $REQUEST->getPost('telefonoTutor');
                $celularTutor   = $REQUEST->getPost('celularTutor');
                $recurso_archivo   = $REQUEST->getFile('mypic');
                
            }elseif(isset($_POST['btnAlumnoInscrito'])){
                $tipoAlumno=2;
                $nombre     = $REQUEST->getPost('nombre');
                $apaterno   = $REQUEST->getPost('apaterno');
                $amaterno   = $REQUEST->getPost('amaterno');
                $edad       = null;
                $telefono   = null;
                $celular    = $REQUEST->getPost('celular');
                $correo     = $REQUEST->getPost('correo');
    
    
                $nombreTutor    = null;
                $apaternoTutor  = null;
                $amaternoTutor  = null;
                $parentesco     = null;
                $telefonoTutor  = null;
                $celularTutor   = null;
                $recurso_archivo   = $REQUEST->getFile('baucher');
 
            }

            $metodoPago    = $REQUEST->getPost('metodo_pago');

            $cuatro_dijitos = $REQUEST->getPost('cuatro_dijitos');
            $sucursal       = $REQUEST->getPost('sucursal');


            


            if($REQUEST->getPost('metodo_pago')=="deposito"){
                $afiliacion    = $REQUEST->getPost('afiliacion');
                $autorizacion  = $REQUEST->getPost('autorizacion');
                $clave_rastreo = "";
                $referencia    = "";
            }
                  
            if($REQUEST->getPost('metodo_pago')=="transferencia"){
                $afiliacion    = "";
                $autorizacion  = "";
                $clave_rastreo = $REQUEST->getPost('clave_rastreo');
                $referencia    = $REQUEST->getPost('referencia');
            }

            

            $hoy               = date("d-m-Y");
            $directorioRemoto  = "img-upload/$hoy/";
            
            
           
            $nombre_archivo = str_replace(' ','',$recurso_archivo->getClientName());
            $recurso_extension = $recurso_archivo->getClientExtension();

            $rutaImagen = "/".$directorioRemoto."/".$nombre_archivo;
            if ($recurso_archivo->isValid() && !$recurso_archivo->hasMoved()) {
                if (!is_dir($directorioRemoto )) {
                    try {
                        mkdir($directorioRemoto , 0777, TRUE);
                    } catch (\Exception $e) {
                        $data = [
                            'mensaje-recurso'  => 'Hay problemas a crear la carpeta',
                            'tipo-mensaje' => 'alert-danger'
                        ];
                        $this->session->set($data, true);
                    }  
                }  
                try {
                $recurso_archivo->move($directorioRemoto, $nombre_archivo);
                } catch(\Exception $e){
                    $data = [
                        'mensaje-recurso'  => 'El recurso no se pudo copiar a ruta destino',
                        'tipo-mensaje' => 'alert-danger'
                    ];
                    $this->session->set($data, true);
                }

                $data = [
                    'mensaje-recurso'  => 'Se registro su información correctamente.',
                    'tipo-mensaje' => 'alert-success'
                    ];
                    $this->session->set($data, true);
            }

         



            $data = ['nombre'=>$nombre,
            'apellidoPaterno'=>$apaterno,
            'apellidoMaterno'=>$amaterno,
            'tipoAlumno'=>$tipoAlumno,
            'edad'=>$edad,
            'telefono'=>$telefono,
            'celular'=>$celular,
            'correo'=>$correo,
            'nombrePapa'=>$nombreTutor,
            'apellidoPaternoPapa'=>$apaternoTutor,
            'apellidoMaternoPapa'=>$amaternoTutor,
            'parentesco'=>$parentesco,
            'telefonoCasaPapa'=>$telefonoTutor,
            'celularPapa'=>$celularTutor,
            'metodoPago'=>$metodoPago,
            'terminacionCuatroDigitos'=>$cuatro_dijitos,
            'sucursalInteres'=>$sucursal,
            'afiliacion'=>$afiliacion,
            'autorizacion'=>$autorizacion,
            'claveRastreo'=>$clave_rastreo,
            'referencia'=>$referencia,
            'rutaImagen'=>$rutaImagen,
            'fecha_creacion'=>$hoy,
            'fecha_ultimo_cambio'=>$hoy,
            ];
   


         

            $modelPagos = new Pagos($db);
            $modelPagos->insert($data);
            $data = ['mensaje-recurso'  => 'Se registro su información correctamente',
            'tipo-mensaje' => 'alert-success'
            ];
            $this->session->set($data,true);
        


        return view('formulario', $data);
    }
}
