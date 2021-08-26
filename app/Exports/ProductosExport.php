<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Producto::all('codigo_barras',
        'descripcion',
        'familia',
        'precio_compra',
        'precio_venta',
        'itbis',
        'existencia',
        'existencia_minima');
    }

    public function headings(): array
        {
            return [
                'codigo_barras',
                'descripcion',
                'familia',
                'precio_compra',
                'precio_venta',
                'itbis',
                'existencia',
                'existencia_minima',

            ];
        }
}
