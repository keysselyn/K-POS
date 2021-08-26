
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Familias de Produtos <i class="fas fa-boxes"></i></h1>
    <hr />


@stop

@section('content')

@livewire('familias')
@stop

@section('css')

    @livewireStyles
@stop

@section('js')

    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#exampleModal').modal('hide');
            $('#updateModal').modal('hide');
        });
    </script>
    <script>
        imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
        blah.src = URL.createObjectURL(file)
            }
        }
    </script>




@stop
