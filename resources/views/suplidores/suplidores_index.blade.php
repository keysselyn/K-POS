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
<h1>Suplidores <i class="fas fa-people-carry"></i></h1>
<hr />

@stop

@section('content')
<div class="row">
        <div class="col-12">

            <div class="card card-secondary">
              <div class="card-header">
                <a href="{{route("suplidores.create")}}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
                <div class="card-tools">
                    <form action="{{route('suplidores.index')}}" method="GET" class="form-inline my-2 my-lg-0">
                        <input  name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                      </form>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>RNC</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Direccion</th>
                        <th>Municipio</th>
                        <th>Provincia</th>

                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suplidores as $suplidore)
                        <tr>
                            <td>{{$suplidore->rnc}}</td>
                            <td>{{$suplidore->nombre}}</td>
                            <td>{{$suplidore->telefono}}</td>
                            <td>{{$suplidore->direccion}}</td>
                            <td>{{$suplidore->municipio}}</td>
                            <td>{{$suplidore->provincia}}</td>
                            <td class="project-actions">
                                <form action="{{route("suplidores.destroy", [$suplidore])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <a class="btn btn-warning btn-sm" href="{{route("suplidores.edit", [$suplidore])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer sm">
                {{$suplidores->links('pagination::bootstrap-4')}}
            </div>
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
