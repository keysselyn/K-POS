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
<h1>Productos <i class="fa fa-box"></i></h1>
<!--Exportar -->
<!--Importar -->

<form action="{{route('ImportExcel')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (Session::has('messege'))
    <p><h1>{{Session::get('messege')}}</h1></p>
    @endif

    <div class="input-group">
        <div class="custom-file">
          <input required type="file" class="custom-file-input" id="inputGroupFile" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
          <label class="custom-file-label" for="inputGroupFile">Importar Excel</label>
        </div>
        <div class="input-group-append">
            <button type="submit" class="input-group-text"><i class="fas fa-upload"></i></button>
        </div>
      </div>

</form>
<hr />

@stop

@section('content')
<div class="row">
        <div class="col-12">

        <div class="card card-secondary">
        <div class="card-header">
            <a href="{{route("productos.create")}}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
            <a class="btn btn-success" href="{{route('ExportExcel')}}"><i class="fas fa-file-excel"></i> Expotar Excel</a>
                <div class="card-tools">
                    <form action="{{route('productos.index')}}" method="GET" class="form-inline my-2 my-lg-0">
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
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Familia</th>
                        <th>Costo</th>
                        <th>Venta</th>
                        <th>Itbis</th>
                        <th>Utilidad</th>
                        <th>Stock</th>
                        <th>Stock Minimo</th>
                        <th>Imagen</th>

                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo_barras}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->familia_a->descripcion}}</td>
                            <td>{{$producto->precio_compra}}</td>
                            <td>{{$producto->precio_venta}}</td>
                            <td>{{$producto->impuesto_a->descripcion}}</td>
                            <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                            <td>{{$producto->existencia}}</td>
                            <td>{{$producto->existencia_minima}}</td>
                            <td>
                                @if ($producto->imagen)
                                <img src="{{$producto->imagen}}" alt="" class="img-thumbnail" width="50" height="50">
                                @endif
                            </td>
                            <td>
                                <div class="row">

                                <form action="{{route("productos.destroy", [$producto])}}" method="post" class="frm-eliminar">
                                    @method("delete")
                                    @csrf
                                    <a class="btn btn-warning btn-sm" href="{{route("productos.edit",[$producto])}}">
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
                {{$productos->links()}}
            </div>

            </div>
        </div>
    </div>

@stop

@section('css')

    <style type="text/css">
        .custom-file-input ~ .custom-file-label::after {
        content: "Buscar";
        }
    </style>
@stop

@section('js')
@include("notificacion")

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
      '!Eliminado',
      'El Producto fue eliminado',
      'success'
    )
</script>
@endif


<script>
$('.frm-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
    title: 'Esta Seguro?',
    text: "!Este producto sera eliminado",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      this.submit();
    }
  })

});
</script>




<script>
$('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    })
</script>
@stop
