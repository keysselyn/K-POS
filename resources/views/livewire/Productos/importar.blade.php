<div wire:ignore.self class="modal fade" data-backdrop="static" id="ModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-dark">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalCenterTitle">Importrar Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Seleccione el archivo para importar
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile" wire:model="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    @if ($file !== NULL)
                    <label class="custom-file-label" for="inputGroupFile">{{$file->getClientOriginalName()}}</label>
                    @else
                    <label class="custom-file-label" for="inputGroupFile">Buscar Archivo..</label>
                    @endif

                  </div>
                  @error('file') <span class="error text-danger">{{ $message }}</span> @enderror
                  <p wire:loading>
                    Cargando...
                  </p>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel() type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-success" wire:click.prevent="ImportExcel()" data-dismiss="modal"><i class="fa fa-trash"></i> Importar </a>
            </div>
        </div>
    </div>
</div>
