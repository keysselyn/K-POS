@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Impuestos <i class="fas fa-dollar-sign"></i></h1>
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
        <i class="fas fa-plus"></i> Crear Impuesto
      </button>
                <div class="card-tools">
                    <form action="{{route('impuestos.index')}}" method="GET" class="form-inline my-2 my-lg-0">
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
                        <th>Descripción</th>
                        <th>Porcentaje %</th>

                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($impuestos as $impuesto)
                        <tr>
                            <td>{{$impuesto->descripcion}}</td>
                            <td>
                                {{$impuesto->porcentaje}}
                            </td>
                            <td>
                                <div class="row">

                                <form action="{{route("impuestos.destroy", [$impuesto])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <a class="btn btn-warning btn-sm" href="{{route("impuestos.edit",[$impuesto])}}">
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
                {{$impuestos->links('pagination::bootstrap-4')}}
            </div>

            </div>
        </div>
    </div>






<!-- Ventana modal -->
<div class="modal fade" id="ModalFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Impuesto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <!-- form start -->

        <form method="POST" action="{{route("impuestos.store")}}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col">
                  <label for="descripcion">Descripción</label>
                  <input required name="descripcion" type="text" class="form-control form-control-border border-width-2">
                </div>
                <div class="form-group col">
                    <label for="descripcion">Porcentaje %</label>
                    <input required name="porcentaje" type="number" class="form-control form-control-border border-width-2">
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
    @include("notificacion")
    <script> console.log('Hi!'); </script>
@stop

