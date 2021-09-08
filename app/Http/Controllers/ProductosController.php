<?php
/*


██╗░░██╗███╗░░░███╗██████╗░██████╗░
██║░██╔╝████╗░████║██╔══██╗██╔══██╗
█████═╝░██╔████╔██║██████╔╝██████╦╝
██╔═██╗░██║╚██╔╝██║██╔══██╗██╔══██╗
██║░╚██╗██║░╚═╝░██║██║░░██║██████╦╝
╚═╝░░╚═╝╚═╝░░░░░╚═╝╚═╝░░╚═╝╚═════╝░

    Copyright (c) 2021 Keysselyn Rodriguez
    Licenciado bajo la licencia MIT

    El texto de arriba debe ser incluido en cualquier redistribucion
*/ ?>
<?php

namespace App\Http\Controllers;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("productos.productos_index");
    }

}
