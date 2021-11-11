<?php
use  App\Models\Sucursales;


function getSucursales()
{
    $usermodel = new Sucursales($db);
    $usermodel->select('id, nombre');
    $usermodel->where('deleted',0);
    $query = $usermodel->get();
    $row = $query->getResult();
    return($row);

}

function getSucursal($id)
{
    $usermodel = new Sucursales($db);
    $usermodel->select('id, nombre');
    $usermodel->where('id',$id);
    $usermodel->where('deleted',0);
    $query = $usermodel->get();
    $row = $query->getRow();
    
    return($row);

}
?>