{{--

____          _____               _ _           _
|  _ \        |  __ \             (_) |         | |
| |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___
|  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
| |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
|____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
       __/ |                               __/ |
      |___/                               |___/

  Blog:       https://parzibyte.me/blog
  Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
  Contacto:   https://parzibyte.me/blog/contacto/

  Copyright (c) 2020 Luis Cabrera Benito
  Licenciado bajo la licencia MIT

  El texto de arriba debe ser incluido en cualquier redistribucion
--}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo cliente <i class="fas fa-user-plus"></i></h1>
    <hr />
@stop

@section('content')
<div class="row">
        <div class="col-12">
        <div class="card card-success">
              <div class="card-header">

              </div>
              <!-- /.card-header -->
              <!-- form start -->

            <form method="POST" action="{{route("clientes.store")}}">
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-3 form-group">
                        <label class="label">RNC:</label>
                        <input autocomplete="off" name="rnc" class="form-control form-control-border border-width-2" type="text" placeholder="Rnc/Cedula">
                    </div>

                  <div class="col form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="nombre" class="form-control form-control-border border-width-2" type="text" placeholder="Nombre">
                    </div>

                  </div>
                <div class="row">
                    <div class="col-3 form-group">
                        <label class="label">Teléfono</label>
                        <input required autocomplete="off" id="telefono" name="telefono" class="form-control form-control-border border-width-2"
                           type="text" placeholder="Teléfono">
                    </div>

                    <div class="col form-group">
                        <label class="label">Direccion</label>
                     <input required autocomplete="off" name="direccion" class="form-control form-control-border border-width-2"
                           type="text" placeholder="Direccion">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label class="label">Municipio</label>
                        <input required autocomplete="off" name="municipio" class="form-control form-control-border border-width-2"
                           type="text" placeholder="Municipio">
                    </div>
                    <div class="col form-group">
                        <label class="label">Provincia</label>
                        <input required autocomplete="off" name="provincia" class="form-control form-control-border border-width-2"
                           type="text" placeholder="Provincia">
                    </div>
                </div>
                </div>
                <div class="card-footer">
                @include("notificacion")
                <button class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{route("clientes.index")}}">Cancelar</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
