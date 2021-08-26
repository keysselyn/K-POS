<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";
    protected $fillable = ["razon_social", "rnc_cedula", "telefono", "provincia", "municipio", "direccion", "imagen"];
}
