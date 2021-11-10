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
?>