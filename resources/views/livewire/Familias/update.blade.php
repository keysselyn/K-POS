<div wire:ignore.self class="modal fade" data-backdrop="static" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header bg-warning">
              <h5 class="modal-title">Editar Almacen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span wire:click.prevent="cancel()" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <!-- form start -->
            <div class="row ">
                <div class="form-group col">
                    <input type="hidden" wire:model="selected_id">
                <label>Descripcion</label>
                  <input wire:model="descripcion" type="text" class="form-control form-control-border border-width-2">
                  @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-3">
                    <div class="row border">
                        @if ($imagen2 === $imagen )
                            @if ($imagen === NULL)
                            <img class="rounded mx-auto d-block" id="blah" src="/public/no-img.png" alt="Imagen"  width="100" height="100"/>

                            @else
                            <img class="rounded mx-auto d-block" id="blah" src="{{ $imagen2 }}" alt="Imagen"  width="100" height="100"/>
                            @endif

                        @else
                        <img class="rounded mx-auto d-block" id="blah" src="{{ $imagen->temporaryUrl() }}" alt="Imagen"  width="100" height="100"/>
                        @endif


                        </div>
                        <div class="row">
                        <label class="btn btn-default form-control form-control-border border-width-2">
                            Buscar imagen <i class="fas fa-images"></i> <input wire:model="imagen" class="" type="file" name="archivo" accept="image/*" hidden id="imgInp">
                        </label>
                        @error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

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

