<div class="row">
    <div class="col-12">





    <div class="card card-secondary">
    <div class="card-header ">
        @include('livewire.almacenes.create')
		@include('livewire.almacenes.update')
        @include('message')

            {{-- Example button to open modal --}}
        <div class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
             <i class="fa fa-plus"></i>  Crear Almacen
        </div>
            <div class="card-tools">
                    <input wire:model='keyWord' name="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
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
                @foreach($almacen as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->direccion}}</td>
                        <td>{{$row->municipio}}</td>
                        <td>{{$row->provincia}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="text-warning fa fa-edit"></i> Editar </a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}"><i class="text-danger fa fa-trash"></i> Eliminar</a>
                                </div>
                            </div>
                            @include('livewire.almacenes.delete')
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer sm">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $almacen->links() }}
            </ul>

        </div>

        </div>
    </div>

</div>


