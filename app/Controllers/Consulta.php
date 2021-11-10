<?php

namespace App\Controllers;
use  App\Models\Pagos;

class Consulta extends BaseController
{
    public function getRegistros()
    {
        // Validar que la sesion este iniciada, si no regresar al login.
        if($this->session->get('login')){
            $model = new Pagos($db);
            $pagos  = $model->withDeleted()->orderBy('nombre', 'ASC')->paginate(15);
            // idSucursal =  $this->session->get('id');
            // depende del roll se ejecutara la sentencia sql $this->session->get('idRoll');
            $paginador = $model->pager;
            $paginador->setPath('controldepagos/Consulta/getRegistros/');
            $data = ['pagos'=>$pagos,
            'paginador'=>$paginador
            ];

            
            $id_usuario= $this->session->get('id');
            $data['id_usuario'] = $id_usuario;

            //return view('alumnos/alumno/index_alumno',$data);
            return view('verRegistros',$data);
        }else{
            return redirect()->to(site_url('Home/salir'));
        }
        
    }
}
