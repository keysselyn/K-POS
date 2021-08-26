@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Almacenes <i class="fas fa-warehouse fa-fw"></i></h1>
    <hr />


@stop

@section('content')

<!-- Tabla -->
<div class="row">
    <div class="col-12">

    <div class="card card-secondary">
    <div class="card-header ">
            {{-- Example button to open modal --}}
<button id="btnFamilia" type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalFamilia">
    <i class="fas fa-plus"></i> Crear Almacen
  </button>
            <div class="card-tools">
                <form action="{{route('almacenes.index')}}" method="GET" class="form-inline my-2 my-lg-0">
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
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Municipio</th>
                    <th>Provincia</th>
                    <th>Telefono</th>


                    <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                @foreach($almacenes as $almacen)
                    <tr>
                        <td>{{$almacen->id}}</td>
                        <td>{{$almacen->nombre}}</td>
                        <td>{{$almacen->direccion}}</td>
                        <td>{{$almacen->municipio}}</td>
                        <td>{{$almacen->provincia}}</td>
                        <td>{{$almacen->telefono}}</td>
                        <td>
                            <div class="row">

                            <form action="{{route("almacenes.destroy", [$almacen])}}" method="post">
                                @method("delete")
                                @csrf
                                <a class="btn btn-warning btn-sm" href="{{route("almacenes.edit",[$almacen])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer sm">
            {{$almacenes->links('pagination::bootstrap-4')}}
        </div>

        </div>
    </div>
</div>






<!-- Ventana modal -->
<div class="modal fade" id="ModalFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Almacen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

            <!-- form start -->

    <form method="POST" action="{{route("almacenes.store")}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col">
              <label for="descripcion">Nombre</label>
              <input required name="nombre" type="text" class="form-control form-control-border border-width-2">
            </div>

          </div>
          <div class="row">
            <div class="form-group col">
              <label for="descripcion">Direccion</label>
              <input required name="direccion" type="text" class="form-control form-control-border border-width-2">
            </div>
            <div class="form-group col">
                <label for="descripcion">Telefono</label>
                <input required name="telefono" type="text" class="form-control form-control-border border-width-2">
              </div>

          </div>
          <div class="row">
          <div class="form-group col">
            <label for="descripcion">Municipio</label>
            <input required name="municipio" type="text" class="form-control form-control-border border-width-2">
          </div>
          <div class="form-group col">
            <label for="descripcion">Provincia</label>
            <input required name="provincia" type="text" class="form-control form-control-border border-width-2">
          </div>
        </div>


    </div>


<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
    @include('notificacion')
    <script> console.log('Hi!'); </script>
@stop
