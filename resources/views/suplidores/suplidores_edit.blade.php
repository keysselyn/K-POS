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
<h1>Editar Suplidor {{$suplidore->id}}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
        <div class="card card-warning">
              <div class="card-header">

              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form method="POST" action="{{route("suplidores.update", [$suplidore])}}">
            <div class="card-body">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-3 form-group">
                        <label class="label">RNC</label>
                        <input required value="{{$suplidore->rnc}}" autocomplete="off" name="rnc"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Rnc">
                    </div>
                    <div class="col form-group">
                        <label class="label">Nombre</label>
                        <input required value="{{$suplidore->nombre}}" autocomplete="off" name="nombre" class="form-control form-control-border border-width-2"
                           type="text" placeholder="Nombre">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3 form-group">
                        <label class="label">Teléfono</label>
                        <input required value="{{$suplidore->telefono}}" autocomplete="off" name="telefono"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Teléfono">
                    </div>
                    <div class="col form-group">
                        <label class="label">Direccion</label>
                        <input required value="{{$suplidore->direccion}}" autocomplete="off" name="direccion"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Direccion">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label class="label">Municipio</label>
                        <input required value="{{$suplidore->municipio}}" autocomplete="off" name="municipio"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Municipio">
                    </div>
                    <div class="col  form-control-group">
                        <label class="label">Provincia</label>
                        <input required value="{{$suplidore->provincia}}" autocomplete="off" name="provincia"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Provincia">
                    </div>
                </div>
            </div>
                <div class="card-footer">

                <button class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{route("suplidores.index")}}">Cancelar</a>
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
@include("notificacion")
    <script> console.log('Hi!'); </script>
@stop

