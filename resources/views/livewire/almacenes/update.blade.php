<!-- Ventana modal -->
<div wire:ignore.self class="modal fade" data-backdrop="static" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
              <h5 class="modal-title">Editar Almacen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span wire:click.prevent="cancel()" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <!-- form start -->
            <div class="row ">
                <div class="form-group col">
                  <label>Nombre</label>
                  <input wire:model="nombre" type="text" class="form-control form-control-border border-width-2">
                  @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="descripcion">Direccion</label>
                  <input wire:model="direccion" type="text" class="form-control form-control-border border-width-2">
                </div>
                <div class="form-group col">
                    <label for="descripcion">Telefono</label>
                    <input wire:model="telefono" type="text" class="form-control form-control-border border-width-2">
                  </div>

              </div>
              <div class="row">
              <div class="form-group col">
                <label for="descripcion">Municipio</label>
                <input wire:model="municipio" type="text" class="form-control form-control-border border-width-2">
              </div>
              <div class="form-group col">
                <label for="descripcion">Provincia</label>
                <input wire:model="provincia" type="text" class="form-control form-control-border border-width-2">
              </div>
            </div>


        </div>


    <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
    </div>


    </div>
    </div>
    </div>
    <!-- END: Ventana modal -->
