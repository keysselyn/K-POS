<div class="row">
    <div class="col-12">





    <div class="card card-secondary">
    <div class="card-header ">
        @include('livewire.familias.create')
		@include('livewire.familias.update')
        @include('message')

            {{-- Example button to open modal --}}
        <div class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
             <i class="fa fa-plus"></i>  Crear Familia
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
                    <th>Descripcion</th>
                    <th>Imagen</th>

                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($familia as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row->descripcion}}</td>
                        <td>
                            @if ($row->imagen === NULL)
                            <img src="/public/no-img.png" alt="" class="img-thumbnail" width="50" height="50">
                            @else
                            <img src="{{$row->imagen}}" alt="" class="img-thumbnail" width="50" height="50">

                            @endif

                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="text-warning fa fa-edit"></i> Editar </a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}"><i class="text-danger fa fa-trash"></i> Eliminar</a>
                                </div>
                            </div>
                            @include('livewire.familias.delete')
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer sm">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $familia->links() }}
            </ul>

        </div>

        </div>
    </div>

</div>


