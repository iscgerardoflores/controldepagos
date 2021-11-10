<?php namespace App\Models;

use CodeIgniter\Model;

class Pagos extends Model
{
    #Nombre de la tabla
    protected $table      = 'pagos';
    #nombre de la clave primaria 
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    #Aqui ponemos el nombre de las columnas que vamos a modifcar
    protected $allowedFields = ['nombre','apellidoPaterno','apellidoMaterno','tipoAlumno','edad','telefono','celular','correo','nombrePapa','apellidoPaternoPapa','apellidoMaternoPapa','parentesco','telefonoCasaPapa','celularPapa','metodoPago','terminacionCuatroDigitos','sucursalInteres','afiliacion','autorizacion','claveRastreo','referencia','rutaImagen'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_ultimo_cambio';
    protected $deletedField  = 'deleted';

    #Reglas de validacion 
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}