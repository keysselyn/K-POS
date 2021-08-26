@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Productos <i class="fas fa-box"></i></h1>
    <hr />


@stop

@section('content')

@livewire('productos')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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


    <script> console.log('Hi!'); </script>
@stop
