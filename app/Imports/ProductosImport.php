<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        return Producto::updateOrCreate([
            'codigo_barras' => $row['codigo_barras']],
            ['descripcion' => $row['descripcion'],
            'familia' => $row['familia'],
            'precio_compra' => $row['precio_compra'],
            'precio_venta' => $row['precio_venta'],
            'itbis' => $row['itbis'],
            'existencia' => $row['existencia'],
            'existencia_minima' => $row['existencia_minima'],
        ]);

}
}
