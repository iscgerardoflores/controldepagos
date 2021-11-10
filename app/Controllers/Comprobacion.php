<?php namespace App\Controllers;
use  App\Models\Usuarios;
class Comprobacion extends BaseController{

    public function check(){

        $REQUEST = \Config\Services::request();  

        if(isset($_POST['login'])){
            $username = strtolower(trim($REQUEST->getPost('credencial')));
            $password = trim($REQUEST ->getPost('inputPassword'));
            $password  = md5($password);
            
            
            
            if($username == null || $password == null){
                    return redirect()->to(site_url('Login'));
            }

            $usermodel = new Usuarios($db);
            $usermodel->select('id,nombre,apellido_paterno,apellido_materno,usuario,idSucursal,idRoll');
            $usermodel->where('usuario',$username);
            $usermodel->where('password',$password);
            $usermodel->where('deleted',0);
            $usermodel->where('estado',1);
            $resultado = $usermodel->get();	
            $row = $resultado->getRow();

            if(empty($row)){ 
                $data = ['errorcredenciales'  => 'Los datos ingresados son incorrectos.'];
                $this->session->set($data);
                return redirect()->to(site_url('Login'));
            }
        
            $namearray = [
            'id'  => $row->id,
            'nombre' =>$row->nombre,
            'apellido' => $row->apellido_paterno,
            'apellido_materno'=> $row->apellido_materno,
            'usuario' => $row->usuario,
            'login' => true,
            'notificaciones_usuario' => true,
            'idSucursal'=>$row->idSucursal,
            'idRoll'=>$row->idRoll,
            ];

            $this->session->set($namearray);

            if($this->session->get('login')){
                return redirect()->to(site_url('Consulta/getRegistros'));
            }	
        }
    }	
}