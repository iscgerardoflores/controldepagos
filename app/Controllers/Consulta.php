<?php

namespace App\Controllers;
use  App\Models\Pagos;

class Consulta extends BaseController
{
    public function getRegistros()
    {
        
        if($this->session->get('login')){
            $model     = new Pagos($db);
            $arrayWhere = ['sucursalInteres' => $this->session->get('idSucursal'), 'estatusPago' => null];
            $pagos     = $model->select('*')->where($arrayWhere)->orderBy('id', 'ASC')->paginate(10);
            $paginador = $model->pager;
            $paginador->setPath('controldepagos/Consulta/getRegistros/');
            $data = ['pagos'=>$pagos,
            'paginador'=>$paginador
            ];
            $id_usuario= $this->session->get('id');
            $data['id_usuario'] = $id_usuario;
            return view('verRegistros',$data);
        }else{
            return redirect()->to(site_url('Home/salir'));
        }
        
    }
}
