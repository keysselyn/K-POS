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
    <h1>Editar producto {{$producto->id}}</h1>
    <hr />
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">

              </div>
            <form method="POST" action="{{route("productos.update", [$producto])}}" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="card-body">
                @method("PUT")
                @csrf
            <div class="row">
                <div class="col-3 form-group">
                    <label class="label">Código de barras</label>
                    <input required value="{{$producto->codigo_barras}}" autocomplete="off" name="codigo_barras"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Código de barras">
                </div>
                <div class="col form-group">
                    <label class="label">Descripción</label>
                    <input required value="{{$producto->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control form-control-border border-width-2"
                           type="text" placeholder="Descripción">
                </div>

                <div class="col-3 form-group">
                    <label class="label">Familia</label>
                    <select class="form-control form-control-border border-width-2" name="familia">
                      @foreach($familia as $familia)
                      <option value="{{$familia->id}}"
                        @if ($producto->familia == $familia->id)
                        selected="selected"
                        @endif>{{$familia->descripcion}}</option>

                      @endforeach
                    </select>
                  </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label class="label">Precio de compra</label>
                    <input required value="{{$producto->precio_compra}}" autocomplete="off" name="precio_compra"
                           class="form-control form-control-border border-width-2"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="col form-group">
                    <label class="label">Precio de venta</label>
                    <input required value="{{$producto->precio_venta}}" autocomplete="off" name="precio_venta"
                           class="form-control form-control-border border-width-2"
                           type="decimal(9,2)" placeholder="Precio de venta">
                </div>


                <div class="col-3 form-group">
                    <label class="label">Itbis</label>
                    <select class="form-control form-control-border border-width-2" name="itbis">
                      @foreach($impuesto as $impuesto)
                      <option value="{{$impuesto->id}}"
                        @if ($producto->itbis == $impuesto->id)
                        selected="selected"
                        @endif>{{$impuesto->descripcion}}</option>

                      @endforeach
                    </select>
                  </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label class="label">Existencia</label>
                    <input required value="{{$producto->existencia}}" autocomplete="off" name="existencia"
                           class="form-control form-control-border border-width-2"
                           type="decimal(9,2)" placeholder="Existencia">
                </div>


                <div class="col form-group">
                    <label  class="label">Existencia Minima</label>
                    <input required value="{{$producto->existencia_minima}}" autocomplete="off" name="existencia_minima" class="form-control form-control-border border-width-2"
                           type="decimal(9,2)" placeholder="Existencia Minima">
                </div>
            </div>

            <div class="col-3">
                <div class="row border">
                    @if ($producto->imagen)
                    <img class="rounded mx-auto d-block" id="blah" src="{{$producto->imagen}}" alt="Imagen"  width="200" height="200"/>
                      @else
                      <img class="rounded mx-auto d-block" id="blah" src="/storage/no-img.png" alt="Imagen"  width="200" height="200"/>
                    @endif
                    </div>
                    <div class="row">
                    <label class="btn btn-default form-control form-control-border border-width-2">
                        Buscar imagen <i class="fas fa-images"></i> <input class="" type="file" name="archivo" accept="image/*" hidden id="imgInp">
                    </label>
                        @error('archivo')
                        <br />
                        <small class="text-danger">'{{$message}}' -- Tipo de archivo no valido</small>
                        @enderror
                    </div>
            </div>


                </div>
                <div class="card-footer">
                @include("notificacion")
                <button class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{route("productos.index")}}">Cancelar</a>
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
        imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
        blah.src = URL.createObjectURL(file)
            }
        }
</script>
    <script> console.log('Hi!'); </script>
@stop
