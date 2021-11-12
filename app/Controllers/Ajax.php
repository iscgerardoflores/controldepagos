<?php

namespace App\Controllers;
use  App\Models\Pagos;

class Ajax extends BaseController
{
    public function updatepago()
    {
        $REQUEST = \Config\Services::request();
        $id = $REQUEST->getPost('idRegistro');
        
        $usermodel = new Pagos($db);
        $data = ['estatusPago'=>1];
        if($usermodel->update($id,$data)){
          echo "exito";
        }else{
          echo "error";
        }
    }
}
