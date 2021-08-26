<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplidores extends Model
{
    protected $table = "suplidores";
    protected $fillable = ["rnc", "nombre", "telefono", "direccion", "municipio", "provincia"];
}
