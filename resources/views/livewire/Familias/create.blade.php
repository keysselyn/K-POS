
<div wire:ignore.self class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header bg-success">
              <h5 class="modal-title">Crear Almacen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <!-- form start -->
                <form>
            <div class="row ">
                <div class="form-group col">

                  <label for="nombre">Descipcion</label>
                  <input wire:model="descripcion" id="descripcion" type="text" class="form-control form-control-border border-width-2">
                  @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-3">
                    <div class="row border">
                        @if ($imagen1)
                        <img class="rounded mx-auto d-block" id="blah" src="{{ $imagen1->temporaryUrl() }}" alt="Imagen"  width="100" height="100"/>
                        @else
                        <img class="rounded mx-auto d-block" id="blah" src="/public/no-img.png" alt="Imagen"  width="100" height="100"/>
                        @endif
                        </div>
                        <div class="row">
                        <label class="btn btn-default form-control form-control-border border-width-2">
                            Buscar imagen <i class="fas fa-images"></i> <input wire:model="imagen1" class="" type="file" name="archivo" accept="image/*" hidden id="imgInp">
                        </label>
                        @error('imagen1') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                  </div>

              </div>
                </form>




        </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
        <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
    </div>


    </div>
    </div>
    </div>


