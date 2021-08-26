@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <hr />
@stop

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card card-warning">
          <div class="card-header">
            
          </div>
        <form method="POST" action="/empresa/{{$empresa->id}}" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="card-body">
            @csrf
            @method('PUT')
        
        <div class="row">
            <div class="col-6 form-group">
                <label for="razon_social">Razon social</label>
                <input name="razon_social"type="text" class="form-control form-control-border border-width-2" id="razon_social" placeholder="Razon social" value="{{$empresa->razon_social}}">
            </div>
            <div class="col-3 form-group">
                <label for="rnc_cedula">Rnc/Cedula</label>
                <input name="rnc_cedula"type="text" class="form-control form-control-border border-width-2" id="rnc_cedula" placeholder="Rnc/Cedula" value="{{$empresa->rnc_cedula}}">
            </div>

            <div class="col-3 form-group">
                <label for="telefono">Telefono:</label>
                <input name="telefono" type="tel" class="form-control form-control-border border-width-2" id="telefono" placeholder="Telefono" value="{{$empresa->telefono}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="provincia">Provincia</label>
                <input name="provincia" type="text" class="form-control form-control-border border-width-2" id="provincia" placeholder="Provincia" value="{{$empresa->provincia}}">
            </div>
            <div class="col-4 form-group">
                <label for="municipio">Municipio</label>
                <input name="municipio" type="text" class="form-control form-control-border border-width-2" id="municipio" placeholder="Municipio" value="{{$empresa->municipio}}">
            </div>

            <div class="col-4 form-group">
                <label for="direccion">Direccion:</label>
                <input name="direccion"class="form-control form-control-border border-width-2" id="direccion" placeholder="Direccion" value=" {{$empresa->direccion }}">
            </div>
        </div>
        <div class="col-3">
            <div class="row border">
                @if ($empresa->imagen)
                <img class="rounded mx-auto d-block" id="blah" src="{{$empresa->imagen}}" alt="Imagen"  width="200" height="200"/>
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
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/empresa" class="btn btn-danger">Cancelar</a>
            </div>
        </form>

    </div>
    </div>
</div>
@stop

@section('css')
    
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
@stop