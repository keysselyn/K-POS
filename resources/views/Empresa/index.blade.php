@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Empresa <i class="fas fa-lg fa-building"></i></h1>
    <!-- Button trigger modal -->
    <hr>
    @if (count($empresas) === 0)
    <button id="btnEmpresa" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEmpresa">
      Crear Empresa
    </button>

    @endif

@stop

@section('content')

<div class="row">
    @foreach ($empresas as $empresa)
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
      <div class="card-header text-muted border-bottom-0">
        Datos de la Empresa: {{ $empresa->id }}
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col-7">
            <h2 class="lead"><b>{{ $empresa->razon_social }}</b></h2>
            <p class="text-muted text-sm"><b>RNC/Cedula:</b> {{ $empresa->rnc_cedula }} </p>

            <ul class="ml-4 mb-0 fa-ul text-muted">
              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Direccion: {{ $empresa->direccion }}. <br /> {{ $empresa->provincia }}, {{ $empresa->municipio }}</li>
              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: {{ $empresa->telefono }}</li>
            </ul>
          </div>
          <div class="col-5 text-center">
            <img src="{{ $empresa->imagen }}" alt="user-avatar" class="rounded img-fluid">
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="text-right">
          <a href="/empresa/{{ $empresa->id }}/edit" class="btn btn-sm btn-warning">
            <i class="fas fa-lg fa-building"></i> Ver/Editar
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>




<!-- Modal -->
<div class="modal fade" id="ModalEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <!-- form start -->
                <form action="/empresa" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col form-group mx-sm-3">
                            <label for="razon_social">Razon social</label>
                            <input name="razon_social"type="text" class="form-control form-control-border border-width-2" id="razon_social" placeholder="Razon social">
                          </div>
                          <div class="col form-group mx-sm-3">
                            <label for="rnc_cedula">Rnc/Cedula</label>
                            <input name="rnc_cedula"type="text" class="form-control form-control-border border-width-2" id="rnc_cedula" placeholder="Rnc/Cedula">
                          </div>
                    </div>

                    <div class="row">
                    <div class="col form-group mx-sm-3">
                      <label for="telefono">Telefono:</label>
                      <input name="telefono" type="tel" class="form-control form-control-border border-width-2" id="telefono" placeholder="Telefono">
                    </div>
                    <div class="col form-group mx-sm-3">
                        <label for="provincia">Provincia</label>
                        <input name="provincia" type="text" class="form-control form-control-border border-width-2" id="provincia" placeholder="Provincia">
                      </div>
                      <div class="col form-group mx-sm-3">
                        <label for="municipio">Municipio</label>
                        <input name="municipio" type="text" class="form-control form-control-border border-width-2" id="municipio" placeholder="Municipio">
                      </div>
                    </div>

                    <div class="row">
                        <div class="col form-group mx-sm-3">
                            <label for="direccion">Direccion:</label>
                            <input name="direccion"  class="form-control form-control-border border-width-2" id="direccion" placeholder="Direccion">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group mx-sm-3">
                          <div class="col-3">
                            <div class="row border">
                                <img class="rounded mx-auto d-block" id="blah" src="/storage/no-img.png" alt="Imagen"  width="150" height="150"/>
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
                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  {{-- Custom --}}
<x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
    icon="fas fa-bell" v-centered static-backdrop scrollable>
    <div style="height:800px;">Read the account policies...</div>
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
    </x-slot>
</x-adminlte-modal>
{{-- Example button to open modal --}}
<x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="bg-teal"/>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>  </script>
    <script>
      imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
      blah.src = URL.createObjectURL(file)
          }
      }
    </script>
    <script>
    $('#ModalEmpresa').on('shown.bs.modal', function () {
        $('#btnEmpresa').trigger('focus')
      })
    </script>

<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#exampleModal').modal('hide');
	});
</script>
@stop
