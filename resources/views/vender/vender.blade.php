@extends('adminlte::page')
    <body class="layout-fixed layout-navbar-fixed sidebar-collapse hold-transition" style="height: auto;">
@section('title', 'Dashboard')

@section('content_header')
<form action="{{route("agregarProductoVenta")}}" method="post">
    @csrf
<div class="input-group">
        <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
               class="form-control form-control-lg"
               placeholder="Código de barras">

    <div class="input-group-append">
        <button type="submit" class="btn btn-lg btn-default">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
</form>
@stop

@section('content')
<div class="row">

    <div class="col-9">
     <div class="card card-primary">
            <div class="card-header">

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>P/Unitario</th>
                            <th>Itbis</th>
                            <th>Valor</th>


                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(session("productos") !== null)
                        @foreach(session("productos") as $producto)
                            <tr>
                                <td>{{$producto->codigo_barras}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td width="150">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button onclick="disminuir()" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input value="{{$producto->cantidad}}" id="quantity" name="quantity" type="number" min="1" class="form-control  form-control-sm">
                                        <span class="input-group-append">
                                            <button onclick="incrementar()" class="btn btn-sm btn-danger"><i class="fas fa-plus"></i></button>
                                        </span>
                                      </div>

                                    </td>
                                <td>${{number_format($producto->precio_venta + (($producto->precio_venta*$producto->porcentaje)/100), 2)}}</td>
                                <td>${{number_format((($producto->precio_venta*$producto->porcentaje)/100)*$producto->cantidad, 2)}}</td>
                                <td>${{number_format(($producto->precio_venta + (($producto->precio_venta*$producto->porcentaje)/100))*$producto->cantidad, 2)}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="card-footer text-muted">

            </div>

        </div>

    </div>
    <div class="col-3">

        <div class="card card-primary">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route("terminarOCancelarVenta")}}" method="post">
                    @csrf


                    <div class="input-group">
                        <div class="input-group-prepend">
                          <a class="btn btn-success" href="/clientes/create"><i class="fas fa-plus"></i> Cliente:</a>
                        </div>
                        <!-- /btn-group -->
                        <select required class="form-control" name="id_cliente" id="id_cliente">
                            @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                      </div>

                      <hr>

                      <div class="table-responsive">
                      <table class="table">
                        <tbody><tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>${{number_format($subtotal, 2)}}</td>
                        </tr>
                        <tr>
                          <th>Descueto</th>
                          <td>$0.00</td>
                        </tr>
                        <tr>
                          <th>Itbis:</th>
                          <td>${{number_format($itbis, 2)}}</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>${{number_format($total, 2)}}</td>
                        </tr>
                      </tbody>
                    </table>
                      </div>
                </div>
            <div class="card-footer text-muted">
                @if(session("productos") !== null)
                            <button name="accion" value="terminar" type="submit" class="btn btn-success">Finalizar
                            </button>
                            <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                            </button>
                    @endif

            </div>
        </form>
        </div>

     </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
    @include("notificacion")


    <script>
        function incrementar() {
          document.getElementById("quantity").stepUp();
        }
    </script>
    <script>
        function disminuir() {
          document.getElementById("quantity").stepDown();
        }
    </script>


    <script> console.log('Hi!'); </script>
    <script>
    $(document).ready(function() {
        $('#id_cliente').select2();
    });
    </script>
@stop
